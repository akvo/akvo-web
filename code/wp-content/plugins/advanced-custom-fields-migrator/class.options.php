<?php

/**
 * ACF Migration Cleanup settings class
 *
 * @ref http://alisothegeek.com/2011/01/wordpress-settings-api-tutorial-1/
 */
class ACFM_Settings {
	
	private $sections;
	private $reset;
	private $settings;
	private $required			= ' <span style="color: red;">*</span>';
	
	/**
	 * Construct
	 */
	public function __construct() {
		global $wpdb;
		
		// This will keep track of the checkbox options for the validate_settings function.
		$this->reset			= array();
		$this->settings			= array();
		$this->get_settings();
		
		$this->sections['selection']	= __( 'Post Selection', 'acf-migrator');
		$this->sections['general']		= __( 'General Settings', 'acf-migrator');
		$this->sections['testing']		= __( 'Testing Options', 'acf-migrator');
		$this->sections['reset']		= __( 'Reset/Restore', 'acf-migrator');
		$this->sections['about']		= __( 'About ACF Migration Cleanup', 'acf-migrator');
		
		add_action( 'admin_menu', array( &$this, 'add_pages' ) );
		add_action( 'admin_init', array( &$this, 'register_settings' ) );

		load_plugin_textdomain( 'acf-migrator', false, '/advanced-custom-fields-migrator/languages/' );
		
		if ( ! get_option( 'acfm_options' ) )
			$this->initialize_settings();

		$this->wpdb				= $wpdb;
	}
	
	/**
	 * Add options page
	 */
	public function add_pages() {
		
		$admin_page = add_options_page( __( 'ACF Migration Cleanup Settings', 'acf-migrator'), __( 'ACF Migration', 'acf-migrator'), 'manage_options', 'acf-migrator-options', array( &$this, 'display_page' ) );
		
		add_action( 'admin_print_scripts-' . $admin_page, array( &$this, 'scripts' ) );
		add_action( 'admin_print_styles-' . $admin_page, array( &$this, 'styles' ) );

		add_screen_meta_link(
        	'acf-migrator-link',
			__('ACF Migration Cleanup', 'acf-migrator'),
			admin_url('tools.php?page=acf-migrator'),
			$admin_page,
			array('style' => 'font-weight: bold;')
		);
		
	}
	
	/**
	 * Create settings field
	 */
	public function create_setting( $args = array() ) {
		
		$defaults = array(
			'id'      => 'default_field',
			'title'   => __( 'Default Field', 'acf-migrator'),
			'desc'    => __( '', 'acf-migrator'),
			'std'     => '',
			'type'    => 'text',
			'section' => 'general',
			'choices' => array(),
			'req'     => '',
			'class'   => ''
		);
			
		extract( wp_parse_args( $args, $defaults ) );
		
		$field_args = array(
			'type'      => $type,
			'id'        => $id,
			'desc'      => $desc,
			'std'       => $std,
			'choices'   => $choices,
			'label_for' => $id,
			'class'     => $class,
			'req'		=> $req
		);
		
		$this->reset[$id] = $std;

		if ( '' != $req )
			$req	= $this->required;
		
		add_settings_field( $id, $title . $req, array( $this, 'display_setting' ), 'acf-migrator-options', $section, $field_args );
	}
	
	/**
	 * Display options page
	 */
	public function display_page() {
		
		echo '<div class="wrap">
	<div class="icon32" id="icon-options-general"></div>
	<h2>' . __( 'ACF Migration Cleanup Settings', 'acf-migrator') . '</h2>';
	
		echo '<form action="options.php" method="post">';
	
		settings_fields( 'acfm_options' );
		echo '<div class="ui-tabs">
			<ul class="ui-tabs-nav">';
		
		foreach ( $this->sections as $section_slug => $section )
			echo '<li><a href="#' . $section_slug . '">' . $section . '</a></li>';
		
		echo '</ul>';
		do_settings_sections( $_GET['page'] );
		
		echo '</div>
		<p class="submit"><input name="Submit" type="submit" class="button-primary" value="' . __( 'Save Changes', 'acf-migrator') . '" /></p>

		<div class="ready">When ready, <a href="'.get_admin_url().'tools.php?page=acf-migrator">'.__('begin migrating', 'acf-migrator').'</a>.</div>
		
	</form>';

		$copyright				= '<div class="copyright">&copy; Copyright %s <a href="http://typo3vagabond.com">TYPO3Vagabond.com.</a></div>';
		$copyright				= sprintf( $copyright, date( 'Y' ) );
		echo					<<<EOD
				$copyright
EOD;
	
	echo '<script type="text/javascript">
		jQuery(document).ready(function($) {
			var sections = [];';
			
			foreach ( $this->sections as $section_slug => $section )
				echo "sections['$section'] = '$section_slug';";
			
			echo 'var wrapped = $(".wrap h3").wrap("<div class=\"ui-tabs-panel\">");
			wrapped.each(function() {
				$(this).parent().append($(this).parent().nextUntil("div.ui-tabs-panel"));
			});
			$(".ui-tabs-panel").each(function(index) {
				$(this).attr("id", sections[$(this).children("h3").text()]);
				if (index > 0)
					$(this).addClass("ui-tabs-hide");
			});
			$(".ui-tabs").tabs({
				fx: { opacity: "toggle", duration: "fast" }
			});
			
			$("input[type=text], textarea").each(function() {
				if ($(this).val() == $(this).attr("placeholder") || $(this).val() == "")
					$(this).css("color", "#999");
			});
			
			$("input[type=text], textarea").focus(function() {
				if ($(this).val() == $(this).attr("placeholder") || $(this).val() == "") {
					$(this).val("");
					$(this).css("color", "#000");
				}
			}).blur(function() {
				if ($(this).val() == "" || $(this).val() == $(this).attr("placeholder")) {
					$(this).val($(this).attr("placeholder"));
					$(this).css("color", "#999");
				}
			});
			
			$(".wrap h3, .wrap table").show();
			
			// This will make the "warning" checkbox class really stand out when checked.
			// I use it here for the Reset checkbox.
			$(".warning").change(function() {
				if ($(this).is(":checked"))
					$(this).parent().css("background", "#c00").css("color", "#fff").css("fontWeight", "bold");
				else
					$(this).parent().css("background", "none").css("color", "inherit").css("fontWeight", "normal");
			});
			
			// Browser compatibility
			if ($.browser.mozilla) 
			         $("form").attr("autocomplete", "off");
		});
	</script>
</div>';
		
	}
	
	/**
	 * Description for section
	 */
	public function display_section() {
		// code
	}
	
	/**
	 * Description for About section
	 */
	public function display_about_section() {
		
		echo					<<<EOD
			<div style="width: 50%;">
				<p><img class="alignright size-medium" title="Michael in Red Square, Moscow, Russia" src="/wp-content/plugins/advanced-custom-fields-migrator/media/michael-cannon-red-square-300x2251.jpg" alt="Michael in Red Square, Moscow, Russia" width="300" height="225" /><a href="http://wordpress.org/extend/plugins/advanced-custom-fields-migrator/">ACF Migration Cleanup</a> is by <a href="mailto:michael@typo3vagabond.com">Michael Cannon</a>.</p>
				<p>He's <a title="Lot's of stuff about Peichi Liu…" href="http://peimic.com/t/peichi-liu/">Peichi’s</a> smiling man, an adventurous&nbsp;<a title="Water rat" href="http://www.chinesezodiachoroscope.com/facebook/index1.php?user_id=690714457" target="_blank">water-rat</a>,&nbsp;<a title="Michael's poetic like literary ramblings" href="http://peimic.com/t/poetry/">poet</a>,&nbsp;<a title="Road biker, cyclist, biking; whatever you call, I love to ride" href="http://peimic.com/c/biking/">road biker</a>,&nbsp;<a title="My traveled to country list, is more than my age." href="http://peimic.com/c/travel/">world traveler</a>,&nbsp;<a title="World Wide Opportunities on Organic Farms" href="http://peimic.com/t/WWOOF/">WWOOF’er</a>&nbsp;and the <a title="The TYPO3 Vagabond" href="http://typo3vagabond.com/c/featured/">TYPO3 Vagabond</a>&nbsp;with&nbsp;<a title="in2code. Wir leben TYPO3" href="http://www.in2code.de/">in2code</a>.</p>
				<p>If you like this plugin, <a href="http://typo3vagabond.com/about-vagabond/donate/">please donate</a>.</p>
			</div>
EOD;
		
	}
	
	/**
	 * HTML output for text field
	 */
	public function display_setting( $args = array() ) {
		
		extract( $args );
		
		$options = get_option( 'acfm_options' );
		
		if ( ! isset( $options[$id] ) && $type != 'checkbox' )
			$options[$id] = $std;
		elseif ( ! isset( $options[$id] ) )
			$options[$id] = 0;
		
		$field_class = '';
		if ( $class != '' )
			$field_class = ' ' . $class;
		
		switch ( $type ) {
			
			case 'heading':
				echo '</td></tr><tr valign="top"><td colspan="2"><h4>' . $desc . '</h4>';
				break;
			
			case 'checkbox':
				
				echo '<input class="checkbox' . $field_class . '" type="checkbox" id="' . $id . '" name="acfm_options[' . $id . ']" value="1" ' . checked( $options[$id], 1, false ) . ' /> <label for="' . $id . '">' . $desc . '</label>';
				
				break;
			
			case 'select':
				echo '<select class="select' . $field_class . '" name="acfm_options[' . $id . ']">';
				
				foreach ( $choices as $value => $label )
					echo '<option value="' . esc_attr( $value ) . '"' . selected( $options[$id], $value, false ) . '>' . $label . '</option>';
				
				echo '</select>';
				
				if ( $desc != '' )
					echo '<br /><span class="description">' . $desc . '</span>';
				
				break;
			
			case 'radio':
				$i = 0;
				foreach ( $choices as $value => $label ) {
					echo '<input class="radio' . $field_class . '" type="radio" name="acfm_options[' . $id . ']" id="' . $id . $i . '" value="' . esc_attr( $value ) . '" ' . checked( $options[$id], $value, false ) . '> <label for="' . $id . $i . '">' . $label . '</label>';
					if ( $i < count( $options ) - 1 )
						echo '<br />';
					$i++;
				}
				
				if ( $desc != '' )
					echo '<br /><span class="description">' . $desc . '</span>';
				
				break;
			
			case 'textarea':
				echo '<textarea class="' . $field_class . '" id="' . $id . '" name="acfm_options[' . $id . ']" placeholder="' . $std . '" rows="5" cols="30">' . wp_htmledit_pre( $options[$id] ) . '</textarea>';
				
				if ( $desc != '' )
					echo '<br /><span class="description">' . $desc . '</span>';
				
				break;
			
			case 'password':
				echo '<input class="regular-text' . $field_class . '" type="password" id="' . $id . '" name="acfm_options[' . $id . ']" value="' . esc_attr( $options[$id] ) . '" />';
				
				if ( $desc != '' )
					echo '<br /><span class="description">' . $desc . '</span>';
				
				break;
			
			case 'text':
			default:
		 		echo '<input class="regular-text' . $field_class . '" type="text" id="' . $id . '" name="acfm_options[' . $id . ']" placeholder="' . $std . '" value="' . esc_attr( $options[$id] ) . '" />';
		 		
		 		if ( $desc != '' )
		 			echo '<br /><span class="description">' . $desc . '</span>';
		 		
		 		break;
		 	
		}
		
	}
	
	/**
	 * Settings and defaults
	 */
	public function get_settings() {
		// General Settings
		$this->settings['revert_migration'] = array(
			'title'   => __( 'Revert Migration?' , 'acf-migrator'),
			'desc'	  => __( 'Did you be like me and migrate your post\'s postmeta and no longer have it? If so, you can migrate them back.', 'acf-migrator' ),
			'type'    => 'checkbox',
			'std'     => 1,
			'section' => 'general'
		);

		$this->settings['reset_autoload'] = array(
			'title'   => __( 'Reset Autoload?' , 'acf-migrator'),
			'desc'	  => __( 'If set, autoload is set to \'no\'. Great for performance.', 'acf-migrator' ),
			'type'    => 'checkbox',
			'std'     => 1,
			'section' => 'general'
		);

		$this->settings['force_autoload_no'] = array(
			'title'   => __( 'Force Autoload \'no\'?' , 'acf-migrator'),
			'desc'	  => __( 'If set, autoload is forced to \'no\' for ACF Option updates. Great for performance.', 'acf-migrator' ),
			'type'    => 'checkbox',
			'std'     => 1,
			'section' => 'general'
		);

		// Testing
		$this->settings['migration_limit'] = array(
			'section' => 'testing',
			'title'   => __( 'Migration Limit', 'acf-migrator'),
			'desc'    => __( 'Number of records allowed to migrate at a time. 0 for all.', 'acf-migrator'),
			'std'     => '',
			'type'    => 'text'
		);
		
		$this->settings['debug_mode'] = array(
			'section' => 'testing',
			'title'   => __( 'Debug Mode' , 'acf-migrator'),
			'desc'	  => __( 'Bypass Ajax controller to handle migration directly for testing purposes', 'acf-migrator' ),
			'type'    => 'checkbox',
			'std'     => 0
		);
		
		$desc_all				= __( "This will remove ALL non-migrateable records from wp_postmeta.", 'acf-migrator');
		$desc_imports			= __( "This will remove ALL non-migrateable records from wp_postmeta.", 'acf-migrator');

		// Reset/restore
		if ( false ) {
		$this->settings['delete'] = array(
			'section' => 'reset',
			'title'   => __( 'Delete…', 'acf-migrator'),
			'type'    => 'radio',
			'std'     => '',
			'choices' => array(
				'all'			=> __( 'Non-migrateables', 'acf-migrator') . ': ' . $desc_all,
				// 'videos'		=> __( 'Imported videos', 'acf-migrator') . ': ' . $desc_imports,
			)
		);
		}
		
		$this->settings['reset_plugin'] = array(
			'section' => 'reset',
			'title'   => __( 'Reset plugin', 'acf-migrator'),
			'type'    => 'checkbox',
			'std'     => 0,
			'class'   => 'warning', // Custom class for CSS
			'desc'    => __( 'Check this box and click "Save Changes" below to reset plugin options to their defaults.', 'acf-migrator')
		);


		// selection
		$this->settings['posts_to_migrate'] = array(
			'title'   => __( 'Posts to Migrate' , 'acf-migrator'),
			'desc'    => __( "A CSV list of post ids to migrate, like '1,2,3'. If blank, selects all." , 'acf-migrator'),
			'type'	=> 'text',
			'section' => 'selection'
		);
		
		$this->settings['posts_to_skip'] = array(
			'title'   => __( 'Skip Migrating Posts' , 'acf-migrator'),
			'desc'    => __( "A CSV list of posts ids not to import, like '1,2,3'." , 'acf-migrator'),
			'type'	=> 'text',
			'section' => 'selection'
		);
		
		// Here for reference
		if ( false ) {
		$this->settings['example_text'] = array(
			'title'   => __( 'Example Text Input', 'acf-migrator'),
			'desc'    => __( 'This is a description for the text input.', 'acf-migrator'),
			'std'     => 'Default value',
			'type'    => 'text',
			'section' => 'general'
		);
		
		$this->settings['example_textarea'] = array(
			'title'   => __( 'Example Textarea Input', 'acf-migrator'),
			'desc'    => __( 'This is a description for the textarea input.', 'acf-migrator'),
			'std'     => 'Default value',
			'type'    => 'textarea',
			'section' => 'general'
		);
		
		$this->settings['example_checkbox'] = array(
			'section' => 'general',
			'title'   => __( 'Example Checkbox', 'acf-migrator'),
			'desc'    => __( 'This is a description for the checkbox.', 'acf-migrator'),
			'type'    => 'checkbox',
			'std'     => 1 // Set to 1 to be checked by default, 0 to be unchecked by default.
		);
		
		$this->settings['example_heading'] = array(
			'section' => 'general',
			'title'   => '', // Not used for headings.
			'desc'    => 'Example Heading',
			'type'    => 'heading'
		);
		
		$this->settings['example_radio'] = array(
			'section' => 'general',
			'title'   => __( 'Example Radio', 'acf-migrator'),
			'desc'    => __( 'This is a description for the radio buttons.', 'acf-migrator'),
			'type'    => 'radio',
			'std'     => '',
			'choices' => array(
				'choice1' => 'Choice 1',
				'choice2' => 'Choice 2',
				'choice3' => 'Choice 3'
			)
		);
		
		$this->settings['example_select'] = array(
			'section' => 'general',
			'title'   => __( 'Example Select', 'acf-migrator'),
			'desc'    => __( 'This is a description for the drop-down.', 'acf-migrator'),
			'type'    => 'select',
			'std'     => '',
			'choices' => array(
				'choice1' => 'Other Choice 1',
				'choice2' => 'Other Choice 2',
				'choice3' => 'Other Choice 3'
			)
		);
		}
	}
	
	/**
	 * Initialize settings to their default values
	 */
	public function initialize_settings() {
		
		$default_settings = array();
		foreach ( $this->settings as $id => $setting ) {
			if ( $setting['type'] != 'heading' )
				$default_settings[$id] = $setting['std'];
		}
		
		if ( ! add_option( 'acfm_options', $default_settings, null, 'no' ) )
			update_option( 'acfm_options', $default_settings );
		
	}
	
	/**
	* Register settings
	*/
	public function register_settings() {
		
		register_setting( 'acfm_options', 'acfm_options', array( &$this, 'validate_settings' ) );
		
		foreach ( $this->sections as $slug => $title ) {
			if ( $slug == 'about' )
				add_settings_section( $slug, $title, array( &$this, 'display_about_section' ), 'acf-migrator-options' );
			else
				add_settings_section( $slug, $title, array( &$this, 'display_section' ), 'acf-migrator-options' );
		}
		
		$this->get_settings();
		
		foreach ( $this->settings as $id => $setting ) {
			$setting['id'] = $id;
			$this->create_setting( $setting );
		}
		
	}
	
	/**
	* jQuery Tabs
	*/
	public function scripts() {
		
		wp_print_scripts( 'jquery-ui-tabs' );
		
	}
	
	/**
	* Styling for the plugin options page
	*/
	public function styles() {
		
		wp_register_style( 'acf-migrator-admin', plugins_url( 'settings.css', __FILE__ ) );
		wp_enqueue_style( 'acf-migrator-admin' );
		
	}
	
	/**
	* Validate settings
	*/
	public function validate_settings( $input ) {
		if ( ! empty( $input['debug_mode'] ) && empty( $input['posts_to_migrate'] ) ) {
			// TODO this is reached, but error not showing up
			add_settings_error( 'acf-migrator-options', 'posts_to_migrate', __( 'Posts to Migrate is required' , 'acf-migrator') );
		}

		if ( '' != $input['migration_limit'] ) {
			$input['migration_limit']	= intval( $input['migration_limit'] );
		}
		
		if ( '' != $input['posts_to_migrate'] ) {
			$posts_to_migrate		= $input['posts_to_migrate'];
			$posts_to_migrate		= preg_replace( '#\s+#', '', $posts_to_migrate);

			$input['posts_to_migrate']	= $posts_to_migrate;
		}
		
		if ( '' != $input['posts_to_skip'] ) {
			$posts_to_skip		= $input['posts_to_skip'];
			$posts_to_skip		= preg_replace( '#\s+#', '', $posts_to_skip);

			$input['posts_to_skip']	= $posts_to_skip;
		}

		if ( ! empty( $input['delete'] ) ) {
			set_time_limit( 0 );

			switch ( $input['delete'] ) {
				case 'all' :
					$this->delete_non_migrateables();
					break;

//				case 'videos' :
//					$this->delete_non_migrateables();
//					break;
			}

			unset( $input['delete'] );
			return $input;
		}

		if ( $input['reset_plugin'] ) {
			foreach ( $this->reset as $id => $std ) {
				$input[$id]	= $std;
			}
			
			unset( $input['reset_plugin'] );
		}

		return $input;

	}

	function delete_non_migrateables() {
		return true;

		// TODO join postmeta with posts, delete postmeta with no posts
		$post_count				= 0;

		// during botched migrations not all postmeta is read successfully
		// pull post ids with typo3_uid as post_meta key
		$posts					= $this->wpdb->get_results( "SELECT post_id FROM {$this->wpdb->postmeta} WHERE meta_key = '$key'" );

		foreach( $posts as $post ) {
			// returns array of obj->ID
			$post_id			= $post->post_id;

			// dels post, meta & documents
			// true is force delete
			wp_delete_post( $post_id, true );

			$post_count++;
		}

		add_settings_error( 'acf-migrator-options', 'migrations', sprintf( __( "Successfully removed %s postmeta records" , 'acf-migrator'), number_format( $post_count ) ), 'updated' );
	}
}

$ACFM_Settings					= new ACFM_Settings();

function get_acfm_options( $option, $default = false ) {
	$options					= get_option( 'acfm_options', $default );
	if ( isset( $options[$option] ) ) {
		return $options[$option];
	} else {
		return false;
	}
}

function update_acfm_options( $option, $value = null ) {
	$options					= get_option( 'acfm_options' );

	if ( ! is_array( $options ) ) {
		$options				= array();
	}

	$options[$option]			= $value;
	update_option( 'acfm_options', $options );
}
?>