<?php
/**
Plugin Name: Advanced Custom Fields Migration Cleanup
Plugin URI: http://wordpress.org/extend/plugins/advanced-custom-fields-migrator/
Description: Correct and prevent Advanced Custom Fields options migration autoload 'yes' to 'no'.
Version: 0.0.5
Author: Michael Cannon
Author URI: http://typo3vagabond.com/contact-typo3vagabond/
License: GPLv2 or later

Copyright: 2012  Michael Cannon  (email : michael@typo3vagabond.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */


if ( ! is_admin() )
	return;


require_once( 'class.options.php' );
require_once( 'screen-meta-links.php' );


class Acf_Field_Migration {
	private $wpdb				= null;
	private $migrate_id			= null;

	// Plugin initialization
	public function Acf_Field_Migration() {
		if ( ! current_user_can( 'edit_posts' ) )
			return;

		global $wpdb;
		$this->wpdb			= $wpdb;

		load_plugin_textdomain( 'acf-field-migrator', false, '/advanced-custom-fields-migrator/languages/' );

		add_action( 'added_option', array( &$this, 'force_autoload_no' ), 10, 2 );

		if ( ! current_user_can( 'manage_options' ) )
			return;

		$this->options_link		= '<a href="'.get_admin_url().'options-general.php?page=acf-migrator-options">'.__('Settings', 'acf-migrator').'</a>';

		add_action( 'admin_enqueue_scripts', array( &$this, 'admin_enqueues' ) );
		add_action( 'admin_menu', array( &$this, 'add_admin_menu' ) );
		add_action( 'wp_ajax_acfmigrator', array( &$this, 'ajax_process_record' ) );
		add_filter( 'plugin_action_links', array( &$this, 'add_plugin_action_links' ), 10, 2 );
	}


	public function force_autoload_no( $option, $value ) {
		if ( ! get_acfm_options( 'force_autoload_no' ) )
			return true;

		// Only for ACF fields - for now
		if ( ! preg_match( '#^_+\d+_[a-zA-Z](\w)+$#', $option ) )
			return true;

		$result					= $this->wpdb->update( $this->wpdb->options, array( 'autoload' => 'no' ), array( 'option_name' => $option ) );

		return $result ? true : false;
	}


	// Display a Settings link on the main Plugins page
	public function add_plugin_action_links( $links, $file ) {
		if ( $file == plugin_basename( __FILE__ ) ) {
			array_unshift( $links, $this->options_link );

			$link				= '<a href="'.get_admin_url().'tools.php?page=acf-migrator">'.__('Migrate', 'acf-migrator').'</a>';
			array_unshift( $links, $link );
		}

		return $links;
	}


	// Register the management page
	public function add_admin_menu() {
		$this->menu_id = add_management_page( __( 'ACF Migration', 'acf-migrator' ), __( 'ACF Migration', 'acf-migrator' ), 'manage_options', 'acf-migrator', array(&$this, 'user_interface') );

		add_action( 'admin_print_styles-' . $this->menu_id, array( &$this, 'styles' ) );

        add_screen_meta_link(
        	'acf-migrator-options-link',
			__('ACF Migration Settings', 'acf-migrator'),
			admin_url('options-general.php?page=acf-migrator-options'),
			$this->menu_id,
			array('style' => 'font-weight: bold;')
		);
	}

	public function styles() {
		wp_register_style( 'acf-migrator-admin', plugins_url( 'settings.css', __FILE__ ) );
		wp_enqueue_style( 'acf-migrator-admin' );
	}
	
	// Enqueue the needed Javascript and CSS
	public function admin_enqueues( $hook_suffix ) {
		if ( $hook_suffix != $this->menu_id )
			return;

		// WordPress 3.1 vs older version compatibility
		if ( wp_script_is( 'jquery-ui-widget', 'registered' ) )
			wp_enqueue_script( 'jquery-ui-progressbar', plugins_url( 'jquery-ui/jquery.ui.progressbar.min.js', __FILE__ ), array( 'jquery-ui-core', 'jquery-ui-widget' ), '1.8.6' );
		else
			wp_enqueue_script( 'jquery-ui-progressbar', plugins_url( 'jquery-ui/jquery.ui.progressbar.min.1.7.2.js', __FILE__ ), array( 'jquery-ui-core' ), '1.7.2' );

		wp_enqueue_style( 'jquery-ui-acfmigrator', plugins_url( 'jquery-ui/redmond/jquery-ui-1.7.2.custom.css', __FILE__ ), array(), '1.7.2' );
	}

	public function user_interface() {
		echo <<<EOD
<div id="message" class="updated fade" style="display:none"></div>

<div class="wrap acfmigrator">
	<div class="icon32" id="icon-tools"></div>
	<h2>
EOD;
	_e('ACF Migration Cleanup', 'acf-migrator');
	echo '</h2>';

		// If the button was clicked
		if ( ! empty( $_POST['acf-migrator'] ) || ! empty( $_REQUEST['posts'] ) || get_acfm_options( 'debug_mode' ) ) {
			if ( ! get_acfm_options( 'debug_mode' ) ) {
				// Form nonce check
				check_admin_referer( 'acf-migrator' );
			}

			// Create the list of image IDs
			if ( ! empty( $_REQUEST['posts'] ) ) {
				$posts			= array_map( 'intval', explode( ',', trim( $_REQUEST['posts'], ',' ) ) );
				$count			= count( $posts );
				$posts			= implode( ',', $posts );
			} else {
				$posts			= array();
				$count			= 0;

				if ( false ) {
				$posts			= $this->get_postmeta();
				$count			= count( $posts );
				}

				if ( get_acfm_options( 'revert_migration' ) ) {
					$posts		= $this->get_options();
					$count		= count( $posts );
				}

				// always run cleanup_autoload
				if ( get_acfm_options( 'reset_autoload' ) ) {
					$posts[]	= '0:cleanup_autoload';
					$count++;
				}

				if ( ! get_acfm_options( 'debug_mode' ) && ! $count ) {
					echo '	<p>' . _e( 'All done. No further postmeta to migrate.', 'acf-migrator' ) . "</p></div>";
					return;
				}
			}

			if ( get_acfm_options( 'debug_mode' ) ) {
				print_r($posts); echo '<br />'; echo '' . __LINE__ . ':' . basename( __FILE__ )  . '<br />';	
				foreach ( $posts as $key => $migrate_id ) {
					$this->migrate_id		= $migrate_id;
					$this->ajax_process_record();
				}

				exit( __LINE__ . ':' . basename( __FILE__ ) . " DONE<br />\n" );	
			}

			$posts			= array_unique( $posts );
			$posts			= "'" . implode( "','", $posts ) . "'";
			$this->show_status( $count, $posts );
			delete_transient( 'Acf_Field_Migration-done_uids' );
		} else {
			// No button click? Display the form.
			$this->show_greeting();
		}
		
		echo '</div>';
	}


	public function get_options() {
		// select wp_options having ACF postmeta data
		$sql					= 'SELECT option_id FROM `' . $this->wpdb->options . '` WHERE option_name REGEXP "^__[[:digit:]]+_[[:alnum:]]([[:alnum:]]|_)+$" AND option_value REGEXP "^field_[[:alnum:]]+$"';

		$posts_to_migrate		= get_acfm_options( 'posts_to_migrate' );
		if ( $posts_to_migrate ) {
			$posts_to_migrate	= str_replace( ',', '|', $posts_to_migrate );
			$sql				.= ' AND option_name REGEXP "_(' . $posts_to_migrate . ')_"';
		}

		$posts_to_skip		= get_acfm_options( 'posts_to_skip' );
		if ( $posts_to_skip ) {
			$posts_to_skip		= str_replace( ',', '|', $posts_to_skip );
			$sql				.= ' AND option_name REGEXP "_(' . $posts_to_skip . ')_"';
		}

		$migration_limit		= get_acfm_options( 'migration_limit' );
		if ( $migration_limit ) {
			$sql				.= ' LIMIT ' . $migration_limit;
		}

		$results				= $this->wpdb->get_col( $sql );

		return $results;
	}


	public function get_postmeta() {
		// select distinct post ids haveing postmeta with option_name like "_%"
		$sql					= 'SELECT meta_id FROM `' . $this->wpdb->postmeta . '` WHERE meta_key REGEXP "^_+[[:alnum:]]([[:alnum:]]|_)+$" AND meta_value REGEXP "^field_[[:alnum:]]+$"';

		$posts_to_migrate		= get_acfm_options( 'posts_to_migrate' );
		if ( $posts_to_migrate ) {
			$sql				.= ' AND post_id IN ( ' . $posts_to_migrate . ')';
		}

		$posts_to_skip		= get_acfm_options( 'posts_to_skip' );
		if ( $posts_to_skip ) {
			$sql				.= ' AND post_id NOT IN ( ' . $posts_to_skip . ')';
		}

		$migration_limit		= get_acfm_options( 'migration_limit' );
		if ( $migration_limit ) {
			$sql				.= ' LIMIT ' . $migration_limit;
		}

		$results				= $this->wpdb->get_col( $sql );

		return $results;
	}


	public function cleanup_autoload() {
		// update wp_options having option_name like "_%" and autoload = 'yes'
		// set autoload = no
		// return count of updated records
		$sql					= 'UPDATE `' . $this->wpdb->options . '` SET autoload = "no" WHERE autoload = "yes" AND option_name REGEXP "^_+[[:digit:]]+_[[:alnum:]]([[:alnum:]]|_)+$";';
		$count					= $this->wpdb->query( $sql );

		return $count;
	}


	public function show_status( $count, $posts ) {
		echo '<p>' . __( "Please be patient while postmeta records are migrated. Do not navigate away from this page until this script is done or the migrate will not be completed. You will be notified via this page when the migratation is completed.", 'acf-migrator' ) . '</p>';

		echo '<p id="time-remaining">' . sprintf( __( 'Estimated time required to migrate is %1$s minutes.', 'acf-migrator' ), number_format( $count * .20 ) ) . '</p>';

		$text_goback = ( ! empty( $_GET['goback'] ) ) ? sprintf( __( 'To go back to the previous page, <a href="%s">click here</a>.', 'acf-migrator' ), 'javascript:history.go(-1)' ) : '';

		$text_failures = sprintf( __( 'All done! %1$s postmeta records were successfully migrated in %2$s seconds and there were %3$s failure(s). To try migrating the failed records again, <a href="%4$s">click here</a>. %5$s', 'acf-migrator' ), "' + rt_successes + '", "' + rt_totaltime + '", "' + rt_errors + '", esc_url( wp_nonce_url( admin_url( 'tools.php?page=acf-migrator&goback=1' ), 'acf-migrator' ) . '&posts=' ) . "' + rt_failedlist + '", $text_goback );

		$text_nofailures = sprintf( __( 'All done! %1$s postmeta records were successfully migrated in %2$s seconds and there were no failures. %3$s', 'acf-migrator' ), "' + rt_successes + '", "' + rt_totaltime + '", $text_goback );
?>

	<noscript><p><em><?php _e( 'You must enable Javascript in order to proceed!', 'acf-migrator' ) ?></em></p></noscript>

	<div id="acfmigrator-bar" style="position:relative;height:25px;">
		<div id="acfmigrator-bar-percent" style="position:absolute;left:50%;top:50%;width:300px;margin-left:-150px;height:25px;margin-top:-9px;font-weight:bold;text-align:center;"></div>
	</div>

	<p><input type="button" class="button hide-if-no-js" name="acfmigrator-stop" id="acfmigrator-stop" value="<?php _e( 'Abort Migrating Postmeta', 'acf-migrator' ) ?>" /></p>

	<h3 class="title"><?php _e( 'Debugging Information', 'acf-migrator' ) ?></h3>

	<p>
		<?php printf( __( 'Total media records: %s', 'acf-migrator' ), number_format( $count ) ); ?><br />
		<?php printf( __( 'Records Migrated: %s', 'acf-migrator' ), '<span id="acfmigrator-debug-successcount">0</span>' ); ?><br />
		<?php printf( __( 'Migration Failures: %s', 'acf-migrator' ), '<span id="acfmigrator-debug-failurecount">0</span>' ); ?>
	</p>

	<ol id="acfmigrator-debuglist">
		<li style="display:none"></li>
	</ol>

	<script type="text/javascript">
	// <![CDATA[
		jQuery(document).ready(function($){
			var i;
			var rt_posts = [<?php echo $posts; ?>];
			var rt_total = rt_posts.length;
			var rt_count = 1;
			var rt_percent = 0;
			var rt_successes = 0;
			var rt_errors = 0;
			var rt_failedlist = '';
			var rt_resulttext = '';
			var rt_timestart = new Date().getTime();
			var rt_timeend = 0;
			var rt_totaltime = 0;
			var rt_continue = true;

			// Create the progress bar
			$("#acfmigrator-bar").progressbar();
			$("#acfmigrator-bar-percent").html( "0%" );

			// Stop button
			$("#acfmigrator-stop").click(function() {
				rt_continue = false;
				$('#acfmigrator-stop').val("<?php echo $this->esc_quotes( __( 'Stopping, please wait a moment.', 'acf-migrator' ) ); ?>");
			});

			// Clear out the empty list element that's there for HTML validation purposes
			$("#acfmigrator-debuglist li").remove();

			// Called after each migrate. Updates debug information and the progress bar.
			function AcfMPostsUpdateStatus( id, success, response ) {
				$("#acfmigrator-bar").progressbar( "value", ( rt_count / rt_total ) * 100 );
				$("#acfmigrator-bar-percent").html( Math.round( ( rt_count / rt_total ) * 1000 ) / 10 + "%" );
				rt_count = rt_count + 1;

				if ( success ) {
					rt_successes = rt_successes + 1;
					$("#acfmigrator-debug-successcount").html(rt_successes);
					$("#acfmigrator-debuglist").append("<li>" + response.success + "</li>");
				}
				else {
					rt_errors = rt_errors + 1;
					rt_failedlist = rt_failedlist + ',' + id;
					$("#acfmigrator-debug-failurecount").html(rt_errors);
					$("#acfmigrator-debuglist").append("<li>" + response.error + "</li>");
				}
			}

			// Called when all posts have been processed. Shows the results and cleans up.
			function AcfMPostsFinishUp() {
				rt_timeend = new Date().getTime();
				rt_totaltime = Math.round( ( rt_timeend - rt_timestart ) / 1000 );

				$('#acfmigrator-stop').hide();

				if ( rt_errors > 0 ) {
					rt_resulttext = '<?php echo $text_failures; ?>';
				} else {
					rt_resulttext = '<?php echo $text_nofailures; ?>';
				}

				$("#message").html("<p><strong>" + rt_resulttext + "</strong></p>");
				$("#message").show();
			}

			// Regenerate a specified image via AJAX
			function AcfMPosts( id ) {
				$.ajax({
					type: 'POST',
					url: ajaxurl,
					data: { action: "acfmigrator", id: id },
					success: function( response ) {
						if ( response.success ) {
							AcfMPostsUpdateStatus( id, true, response );
						}
						else {
							AcfMPostsUpdateStatus( id, false, response );
						}

						if ( rt_posts.length && rt_continue ) {
							AcfMPosts( rt_posts.shift() );
						}
						else {
							AcfMPostsFinishUp();
						}
					},
					error: function( response ) {
						AcfMPostsUpdateStatus( id, false, response );

						if ( rt_posts.length && rt_continue ) {
							AcfMPosts( rt_posts.shift() );
						} 
						else {
							AcfMPostsFinishUp();
						}
					}
				});
			}

			AcfMPosts( rt_posts.shift() );
		});
	// ]]>
	</script>
<?php
	}


	public function show_greeting() {
?>
	<form method="post" action="">
<?php wp_nonce_field('acf-migrator') ?>

	<p><?php _e( "Correct and prevent Advanced Custom Fields options migration autoload 'yes' to 'no'. Also, revert unneeded migrations.", 'acf-migrator' ); ?></p>

	<p><?php printf( __( 'Please review your %s before proceeding.', 'acf-migrator' ), $this->options_link ); ?></p>

	<p><?php _e( 'To begin, click the button below.', 'acf-migrator ', 'acf-migrator'); ?></p>

	<p><input type="submit" class="button hide-if-no-js" name="acf-migrator" id="acf-migrator" value="<?php _e( 'Migrate ACF Fields', 'acf-migrator' ) ?>" /></p>

	<noscript><p><em><?php _e( 'You must enable Javascript in order to proceed!', 'acf-migrator' ) ?></em></p></noscript>

	</form>
<?php
		$copyright				= '<div class="copyright">&copy; Copyright %s <a href="http://typo3vagabond.com">TYPO3Vagabond.com.</a></div>';
		$copyright				= sprintf( $copyright, date( 'Y' ) );
		echo $copyright;
	}

	// Process a single image ID (this is an AJAX handler)
	public function ajax_process_record() {
		if ( ! get_acfm_options( 'debug_mode' ) ) {
			error_reporting( 0 ); // Don't break the JSON result
			header( 'Content-type: application/json' );

			// record_id:type_of_record
			$parts				= $_REQUEST['id'];
		} else {
			$parts				= $this->migrate_id;
		}

		if ( ! get_acfm_options( 'debug_mode' ) ) {
			error_log( $parts );
		} else {
			print_r($parts); echo '<br />'; echo '' . __LINE__ . ':' . basename( __FILE__ )  . '<br />';	
		}

		$orig_migrate_id		= $parts;
		$parts					= explode( ':', $parts );
		$type					= isset( $parts[1] ) ? $parts[1] : false;
		$this->migrate_id		= (int) $parts[0];

		$process_type			= '';

		if ( false === $type ) {
			$process_type		= 'post';
		} elseif ( 'cleanup_autoload' == $type ) {
			$process_type		= $type;
		} else {
			die( json_encode( array( 'error' => sprintf( __( "Undefined type: %s", 'acf-migrator' ), esc_html( $orig_migrate_id ) ) ) ) );
		}

		switch( $process_type ) {
			case 'cleanup_autoload':
				$count			= $this->cleanup_autoload();
				
				if ( $count ) {
					$count		= number_format( $count );
					die( json_encode( array( 'success' => sprintf( __( 'wp_options autoload set to \'no\' for %s entries', 'acf-migrator' ), $count ) ) ) );
				} else {
					die( json_encode( array( 'success' => sprintf( __( 'No wp_options autoload settings needed changing', 'acf-migrator' ), $count ) ) ) );
				}
				break;

			case 'post':
				$success		= $this->revert_migration( $this->migrate_id );

				if ( $success ) {
					if ( ! get_acfm_options( 'debug_mode' ) )
						die( json_encode( array( 'success' => sprintf( __( 'Postmeta ID %1$s was successfully restored in %2$s seconds.', 'acf-migrator' ), $this->migrate_id, timer_stop() ) ) ) );
					else
						echo sprintf( __( 'Postmeta ID %1$s was successfully restored in %2$s seconds.', 'acf-migrator' ), $this->migrate_id, timer_stop() ) . '<br />';
				} else {
					if ( ! get_acfm_options( 'debug_mode' ) )
						die( json_encode( array( 'error' => sprintf( __( 'Postmeta ID %1$s was NOT successfully restored in %2$s seconds.', 'acf-migrator' ), $this->migrate_id, timer_stop() ) ) ) );
					else
						echo sprintf( __( 'Postmeta ID %1$s was NOT successfully restored in %2$s seconds.', 'acf-migrator' ), $this->migrate_id, timer_stop() ) . '<br />';
				}
				break;

				// shouldn't be called, but code left in for now incase I have 
				// similar troubles in the future
			case 'migrate-never':
				$success		= $this->migrate_postmeta( $this->migrate_id );

				if ( $success ) {
					if ( ! get_acfm_options( 'debug_mode' ) )
						die( json_encode( array( 'success' => sprintf( __( 'Postmeta ID %1$s was successfully migrated in %2$s seconds.', 'acf-migrator' ), $this->migrate_id, timer_stop() ) ) ) );
					else
						echo sprintf( __( 'Postmeta ID %1$s was successfully migrated in %2$s seconds.', 'acf-migrator' ), $this->migrate_id, timer_stop() ) . '<br />';
				} else {
					if ( ! get_acfm_options( 'debug_mode' ) )
						die( json_encode( array( 'error' => sprintf( __( 'Postmeta ID %1$s was NOT successfully migrated in %2$s seconds.', 'acf-migrator' ), $this->migrate_id, timer_stop() ) ) ) );
					else
						echo sprintf( __( 'Postmeta ID %1$s was NOT successfully migrated in %2$s seconds.', 'acf-migrator' ), $this->migrate_id, timer_stop() ) . '<br />';
				}
				break;

			default:
				if ( ! get_acfm_options( 'debug_mode' ) )
					die( json_encode( array( 'success' => __('Something was done') ) ) );
				else
					echo __('Something was done') . '<br />';
				break;
		}
	}


	public function revert_migration( $id ) {
		$sql					= 'SELECT option_name, option_value FROM `' . $this->wpdb->options . '` WHERE option_id = ' . $id;
		$result					= $this->wpdb->get_row( $sql );

		if ( ! $result )
			return false;

		if ( ! preg_match( '#^__(\d+)_(\w+)$#', $result->option_name, $matches ) )
			return false;

		$post_id				= $matches[ 1 ];
		$meta_key				= $matches[ 2 ];
		$_meta_key				= '_' . $meta_key;

		// no need to unserialize as we're only dealing with strings
		$success				= add_post_meta( $post_id, $_meta_key, $result->option_value, true );

		if ( ! $success )
			update_post_meta( $post_id, $_meta_key, $result->option_value, true );

		$option_name			= str_replace( '__', '_', $result->option_name );
		// get our actual post meta value
		$option_value			= get_option( $option_name );

		$success				= add_post_meta( $post_id, $meta_key, $option_value, true );

		if ( ! $success )
			update_post_meta( $post_id, $meta_key, $option_value, true );

		delete_option( $result->option_name );
		delete_option( $option_name );

		return true;
	}


	public function migrate_postmeta( $id ) {
		$sql					= 'SELECT post_id, meta_key, meta_value FROM `' . $this->wpdb->postmeta . '` WHERE meta_id = ' . $id;
		$result					= $this->wpdb->get_row( $sql );

		if ( ! $result )
			return false;

		// our meta_key is already _alnum formatted
		$option_name			= '_' . $result->post_id . $result->meta_key;
		$_option_name			= '_' . $option_name;
		// no need to unserialize as we're only dealing with strings
		$success				= add_option( $_option_name, $result->meta_value, null, 'no' );

		if ( ! $success )
			update_option( $_option_name, $result->meta_value );

		$meta_key				= ltrim( $result->meta_key, '_' );
		// get our actual post meta value
		$meta_value				= get_post_meta( $result->post_id, $meta_key, true );

		$success				= add_option( $option_name, $meta_value, null, 'no' );

		if ( ! $success )
			update_option( $option_name, $meta_value );

		delete_post_meta( $result->post_id, $result->meta_key );
		delete_post_meta( $result->post_id, $meta_key );

		return true;
	}


	// Helper function to escape quotes in strings for use in Javascript
	public function esc_quotes( $string ) {
		return str_replace( '"', '\"', $string );
	}
}


// Start up this plugin
function Acf_Field_Migration() {
	global $Acf_Field_Migration;
	$Acf_Field_Migration	= new Acf_Field_Migration();
}

add_action( 'init', 'Acf_Field_Migration' );

?>