<div class="wrap">
	
	<?php screen_icon( 'themes' ); ?>
	<h2>Your Subscribers</h2>
	<p>To grow your email list even faster, check out the <a target="_blank" href="https://wordpress.org/plugins/sumome">SumoMe plugin</p>
	<div id="poststuff">
	
		<div id="post-body" class="metabox-holder columns-2">
		
			<!-- main content -->
			<div id="post-body-content">
				
			<form method="post" action="?page=<?php echo esc_js(esc_html($_GET['page'])); ?>">
            <input name="sml_remove" value="1" type="hidden" />
            			<?php 
						if ($_SERVER['REQUEST_METHOD']=="POST" and $_POST['sml_remove']) {
							if ($_GET['rem']) $_POST['rem'][] = $_GET['rem'];
							$count = 0;
							if (is_array($_POST['rem'])) {
								foreach ($_POST['rem'] as $id) { 
									$wpdb->query("delete from ".$wpdb->prefix."sml where id = '".$wpdb->escape($id)."' limit 1"); 
									$count++; 
								}
								$message = $count." subscribers have been removed successfully.";
							}
						}
						
						if ($_SERVER['REQUEST_METHOD']=="POST" and $_POST['sml_import']) {
							$correct = 0;
							if($_FILES['file']['tmp_name']) {
								if(!$_FILES['file']['error'])  {
									$file = file_get_contents ($_FILES['file']['tmp_name']);
									$lines = preg_split('/\r\n|\r|\n/', $file);
									if (count($lines)) {
										$sql = array();
										foreach ($lines as $data) {
											$data = explode(',', $data);
											$num = count($data);
											$row++;
											
											if (is_email(trim($data[0]))) {
												$c = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."sml where sml_email LIKE '".$wpdb->escape(trim($data[0]))."' limit 1", ARRAY_A);
												if (!is_array($c)) {											
													$wpdb->query("INSERT INTO ".$wpdb->prefix."sml (sml_email, sml_name) VALUES ('".$wpdb->escape(trim($data[0]))."', '".$wpdb->escape(trim($data[1]))."')");
													$correct++;
												} else { $exists++; }
											} else { $invalid++; }
										}
										
									} else { $message = 'Oh no! Your CSV file does not apear to be valid, please check the format and upload again.'; }
								
									if (!$message) {
										$message = $correct.' records have been imported. '.($invalid?$invalid.' could not be imported due to invalid email addresses. ':'').($exists?$exists.' already exists. ':'');
									}
								
								} else {
									$message = 'Ooops! There seems to of been a problem uploading your csv';
								}
							}								
						}
						//echo $sql;
						if ($message) { echo '<div style="padding: 5px;" class="updated"><p>'.$message.'</p></div>'; }
						
            			?>
					
	
						<table cellspacing="0" class="wp-list-table widefat fixed subscribers">
                          <thead>
                            <tr>
                                <th style="" class="manage-column column-cb check-column" id="cb" scope="col"><input type="checkbox"></th>
                                <th style="" class="manage-column column-name" id="name" scope="col">Name<span class="sorting-indicator"></span></th>
                                <th style="" class="manage-column column-email" id="email" scope="col"><span>Email Address</span><span class="sorting-indicator"></span></th>
                            </thead>
                        
                            <tfoot>
                            <tr>
                                <th style="" class="manage-column column-cb check-column" scope="col"><input type="checkbox"></th>
                                <th style="" class="manage-column column-name" scope="col"><span>Name</span><span class="sorting-indicator"></span></th>
                                <th style="" class="manage-column column-email" scope="col"><span>Email Address</span><span class="sorting-indicator"></span></th>
                            </tfoot>
                        
                            <tbody id="the-list">
                            
                            <?php 
                            
								$results = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."sml");
								if (count($results)<1) echo '<tr class="no-items"><td colspan="3" class="colspanchange">No mailing list subscribers have been added.</td></tr>';
								else {
									foreach($results as $row) {
	
										echo '<tr>
													<th class="check-column" style="padding:5px 0 2px 0"><input type="checkbox" name="rem[]" value="'.esc_js(esc_html($row->id)).'"></th>
													<td>'.esc_js(esc_html($row->sml_name)).'</td>
  													<td>'.esc_js(esc_html($row->sml_email)).'</td>
											  </tr>';
											  
											  
											  
	
									}
								}
							
							?>
                            
                                
                            </tbody>
                        </table>
                        <br class="clear">
						<input class="button" name="submit" type="submit" value="Remove Selected" /> <a class="button" href="<?php echo plugins_url( 'export-csv.php', __FILE__ ); ?>">Export as CSV</a>
				</form>
				<br class="clear">
                
                
                <div class="meta-box-sortables">
                        <div class="postbox">
                        	
                       	  <h3><span>Import your own CSV File</span></h3>
                          <div class="inside">
                
                <p>This feature allows you to import your own csv (comma seperated values) file into &quot;Mail Subscribe List&quot;.</p>

                <form id="import-csv" method="post" enctype="multipart/form-data" action="?page=<?=esc_js(esc_html($_GET['page']));?>">
                <input name="sml_import" value="1" type="hidden" />
                <p><label><input name="file" type="file" value="" /> CSV File</label></p>
                <p class="description">File must contain no header row, each record on its own line and only two comma seperated collumns in the order of email address followed by name. The name field is optional.</p>
                <p>Example: joe@blogs.com,Joe Blogs</p>
                
                
                
                <p class="submit"><input type="submit" value="Upload and Import CSV File" class="button-secondary" id="submit" name="submit"></p></form>
                </div></div></div>
                
					<div class="meta-box-sortables">
			               <div class="postbox">

			                     	  <h3><span>How to setup</span></h3>
			                        <div class="inside">
										<p>You can use this to subscribe readers from any email service you like. Just export the subscribers whenever you want and import them at your convenience. </p>
										<p>1- <a target="_blank" href="../wp-admin/widgets.php">Click here</a> to add the Subscribe Form Widget</p>
										
										
										<p>2- Add [smlsubform] on any page / post you'd like</p>
										<p>3- Add &lt;?php echo smlsubform(); ?&gt; in any template to show the form</P>
										<p>There are extra options you can add. Such as: [smlsubform nametxt="Name:" nameholder="Name..."] Below is an explanation of what each option does:</p>
				                            <ul>
				                              <li><strong>&quot;prepend&quot;	</strong>-&gt;	Adds a paragraph of text just inside the top of the form.</li>
				                              <li> <strong>&quot;showname&quot;	</strong>-&gt;	If true, this with show the name label and input field for capturing the users name.</li>
				                              <li> <strong>&quot;nametxt&quot;	</strong>-&gt;	Text that is displayed to the left of the name input field.</li>
				                              <li> <strong>&quot;nameholder&quot;	</strong>-&gt;	Text that is displayed inside the name input box as a place holder.</li>
				                              <li> <strong>&quot;emailtxt&quot;	</strong>-&gt;	Text that is displayed to the left of the email input field.</li>
				                              <li> <strong>&quot;emailholder&quot;	</strong>-&gt;	Text that is displayed inside the email input box as a place holder.</li>
				                              <li> <strong>&quot;submittxt&quot;</strong>	-&gt;	Text/value that will be displayed on the form submit button.</li>
				                              <li> <strong>&quot;jsthanks&quot;</strong>	-&gt;	If true, this will display a JavaScript Alert Thank You message instead of a paragraph above the form.</li>
				                              <li> <strong>&quot;thankyou&quot;	</strong>-&gt;	Thank you message that will be displayed when someone subscribes. (Will not show if blank)</li>
				                            </ul>
									</div>
							</div>
			  		</div>

         
                
			</div> 
			
			
			<div id="postbox-container-1" class="postbox-container">
                    <div class="meta-box-sortables">
                        <div class="postbox">
                        	
                       	  <h3><span>Support Us</span></h3>
                            <div class="inside">
                            	
                                <p>We are a small company who makes useful software.<br /><br />
	1- <a style="font-weight:bold;font-size:20px" target="_blank" href="https://wordpress.org/plugins/sumome">Check out our Amazing SumoMe plugin</a>!</p>
								<p>2- <a target="_blank" href="https://wordpress.org/plugins/mail-subscribe-list">Please leave a :) review</a></p>
                            </div>
                      </div> 
                    </div> 
                </div> 
            </div>
            <br class="clear">
	</div>
	
</div> 