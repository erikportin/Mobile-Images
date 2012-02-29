<div class="wrap"><?php screen_icon( 'plugins' ); ?><h2><?php print EP_MFCI_PUGIN_NAME ." ". EP_MFCI_CURRENT_VERSION?></h2><form method="post" action="options.php">    <?php		settings_fields( 'ep-mfci-settings-group' );	?>	<h3>Image size</h3>	<p>Choose what thumbnail size you want to use for you content images on mobile devices.</p>    <table class="form-table">        <tr valign="top">        	<th scope="row">Image Size</th>        	<td>        		<?php					$ep_mfci_wp_sizes = get_intermediate_image_sizes();							// Return false if empty					if( empty( $ep_mfci_wp_sizes ) || !is_array( $ep_mfci_wp_sizes ) )					return false;									echo '<select name="option_image_size">';					if(get_option('option_image_size') == '' ){						$ep_mfci_selected = 'selected="selected"';					}					echo '<option ' .$ep_mfci_selected. ' value="">default</option>';					$ep_mfci_selected = '';					foreach( $ep_mfci_wp_sizes as $ep_mfci_wp_name){						if( get_option('option_image_size') == $ep_mfci_wp_name){							$ep_mfci_selected = 'selected="selected"';						}						echo '<option ' .$ep_mfci_selected. ' value="' .$ep_mfci_wp_name. '">' .$ep_mfci_wp_name. '</option>';						$ep_mfci_selected = '';					}        		?>        	</td>        </tr>    </table>	<p>Download the plugin <a href="http://wordpress.org/extend/plugins/simple-image-sizes/">Simple Image Sizes</a> to add custom thumbnail sizes and regenerate you old images OR <a href="http://codex.wordpress.org/Function_Reference/add_image_size">add them manually to your theme</a></p>		<h3>CSS</h3>		<?php if( version_compare( get_bloginfo( 'version' ), '3.1', '>' ) ) : ?>        <p>If the plugin can't find any thumbnails the image will be shown in it's default size. You can however force the image to scale down (only visualy not actual file size) to fit smaller screens by checking the box below.</p>    <table class="form-table">            <tr valign="top">        	<th scope="row">Add CSS (<a href="http://caniuse.com/#search=max-width">work in these browsers</a>)</th>        	<td>				<input id="option_add_css" type="checkbox" name="option_add_css" value="1"<?php checked( 1 == get_option( 'option_add_css' ) ); ?> />        		<label for="option_add_css">Add CSS to make full size content images responsive</label>        	</td>        </tr>        <tr id="option_add_css_class_wrapper">        	<th scope="row">Add class for content area (if left blank default is entry-content)</th>        	<td>        		<input type="text" id="option_add_css_class" name="options_add_css_class" value="<?php echo get_option('options_add_css_class'); ?>" />        		<span class="class-example">.<span id="content-class"><?php echo ( get_option('options_add_css_class') ? get_option('options_add_css_class') : 'entry-content'); ?></span> img {max-width: 100%;}</span></i>        	</td>		</tr>    </table>        <p class="submit">    	<input type="submit" class="button-primary" value="Save Changes" />    </p>        <?php else :?>        <p>CSS functionality not supported for your current version (<?php echo get_bloginfo( 'version' )?>) of Wordpress. Update to the latest version to get more funtionality.</p>        <?php endif; ?>        <h4>Thank you</h4>    <p><a href="http://code.google.com/p/phpquery/">phpQuery</a> for making it easy to parse the html and <a href="http://www.brettjankord.com/category/categorizr/">Categorizr</a> for mobile first device detection.</p></form></div>