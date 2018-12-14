<?php
//register settings
function portafolio_theme_settings_init(){
	register_setting( 'portafolio_theme_settings', 'portafolio_theme_settings' );
}

//menu
function portafolio_add_settings_page() {
add_menu_page( __( 'Portafolio Settings' ), __( 'Portafolio Settings' ), 'manage_options', 'portafolio-settings', 'portafolio_theme_settings_page');
}

add_action( 'admin_init', 'portafolio_theme_settings_init' );
add_action( 'admin_menu', 'portafolio_add_settings_page' );

//options
$slider_effects = array("random", "fade", "fold", "slideInRight", "slideInLeft", "sliceDown", "sliceDownLeft", "sliceUp", "sliceUpLeft", "sliceUpDown", "sliceUpDownLeft", "boxRandom", "boxRain", "boxRainReverse", "boxRainGrow", "boxRainGrowReverse");

//start settings page
function portafolio_theme_settings_page() {
global $slider_effects;
if ( ! isset( $_REQUEST['updated'] ) )
$_REQUEST['updated'] = false;
?>

<div class="wrap">
<div id="icon-options-general" class="icon32"></div>
<h2><?php _e( 'Portafolio Settings' ) ?></h2>


<?php if ( false !== $_REQUEST['updated'] ) : ?>
<div class="updated fade"><p><strong><?php _e( 'Options saved' ); ?></strong></p></div>
<?php endif; ?>
<form method="post" action="options.php">

<?php settings_fields( 'portafolio_theme_settings' ); ?>
<?php $options = get_option( 'portafolio_theme_settings' ); ?>

<table class="form-table">  



<tr valign="top">
<th scope="row"><?php _e( 'Favicon' ); ?></th>
<td>
<input id="portafolio_theme_settings[favicon]" class="regular-text" type="text" size="36" name="portafolio_theme_settings[favicon]" value="<?php esc_attr_e( $options['favicon'] ); ?>" />
<label class="description abouttxtdescription" for="portafolio_theme_settings[favicon]"><?php _e( 'Upload or type in the URL for the site favicon.' ); ?></label>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e( 'Logo' ); ?></th>
<td>
<input id="portafolio_theme_settings[logo]" class="regular-text" type="text" size="36" name="portafolio_theme_settings[logo]" value="<?php esc_attr_e( $options['logo'] ); ?>" />
<label class="description abouttxtdescription" for="portafolio_theme_settings[logo]"><?php _e( 'Upload or type in the URL for the site favicon.' ); ?></label>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e( 'Portfolio Page URL' ); ?></th>
<td>
<input id="portafolio_theme_settings[portfolio_url]" class="regular-text upload_field" type="text" size="36" name="portafolio_theme_settings[portfolio_url]" value="<?php esc_attr_e( $options['portfolio_url'] ); ?>" />
<label class="description abouttxtdescription" for="portafolio_theme_settings[portfolio_url]"><?php _e( 'Enter the URL to your portfolio page for use on the site.' ); ?></label>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e( 'Slider Transition' ); ?></th>
<td>
<select name="portafolio_theme_settings[effect]">
<?php foreach ($slider_effects as $option) { ?>
<option <?php if ($options['effect'] == $option ){ echo 'selected="selected"'; } ?>><?php echo htmlentities($option); ?></option>
<?php } ?>
</select>					
<label class="description" for="portafolio_theme_settings[effect]"><?php _e( 'Choose the type of transition you want your slider to have. <small>~ Default is random.</small>' ); ?></label>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e( 'Slider Animation Speed' ); ?></th>
<td>
<input id="portafolio_theme_settings[anim_speed]" class="regular-text" type="text" name="portafolio_theme_settings[anim_speed]" value="<?php esc_attr_e( $options['anim_speed'] ); ?>" />
<label class="description" for="portafolio_theme_settings[anim_speed]"><?php _e( 'Type in the speed for the slide transitions in milliseconds. <small>~ Default is 500.</small>' ); ?></label>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e( 'Slider Pause Time' ); ?></th>
<td>
<input id="portafolio_theme_settings[pause_time]" class="regular-text" type="text" name="portafolio_theme_settings[pause_time]" value="<?php esc_attr_e( $options['pause_time'] ); ?>" />
<label class="description" for="portafolio_theme_settings[pause_time]"><?php _e( 'This is the time the image is displayed before it transits to the next, in milliseconds. <small>~ Default is 3000.</small>' ); ?></label>

<tr valign="top">
<th scope="row"><?php _e( 'Analytics Code' ); ?></th>
<td>
<label class="description" for="portafolio_theme_settings[analytics]"><?php _e( 'Enter your analytics tracking code' ); ?></label>
<br />
<textarea id="portafolio_theme_settings[analytics]" class="regular-text" name="portafolio_theme_settings[analytics]" rows="5" cols="36"><?php esc_attr_e( $options['analytics'] ); ?></textarea>
</td>
</tr>



<tr valign="top">
<th scope="row">Get More Themes!</th>
<td>
<a href="http://www.wpexplorer.com/themeforest">Get More Themes</a>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e( 'Facebook' ); ?></th>
<td>
<input id="portafolio_theme_settings[facebook]" class="regular-text" type="text" size="36" name="portafolio_theme_settings[facebook]" value="<?php esc_attr_e( $options['facebook'] ); ?>" />
<label class="description abouttxtdescription" for="portafolio_theme_settings[facebook]"><?php _e( 'Lien vers compte Facebook' ); ?></label>
</td>
</tr>
<tr valign="top">
<th scope="row"><?php _e( '1x' ); ?></th>
<td>
<input id="portafolio_theme_settings[1x]" class="regular-text" type="text" size="36" name="portafolio_theme_settings[1x]" value="<?php esc_attr_e( $options['1x'] ); ?>" />
<label class="description abouttxtdescription" for="portafolio_theme_settings[1x]"><?php _e( 'Lien vers compte 1x' ); ?></label>
</td>
</tr><tr valign="top">
<th scope="row"><?php _e( '500px' ); ?></th>
<td>
<input id="portafolio_theme_settings[500px]" class="regular-text" type="text" size="36" name="portafolio_theme_settings[500px]" value="<?php esc_attr_e( $options['500px'] ); ?>" />
<label class="description abouttxtdescription" for="portafolio_theme_settings[500px]"><?php _e( 'Lien vers compte 500px' ); ?></label>
</td>
</tr>
<tr valign="top">
<th scope="row"><?php _e( 'Google+' ); ?></th>
<td>
<input id="portafolio_theme_settings[google]" class="regular-text" type="text" size="36" name="portafolio_theme_settings[google]" value="<?php esc_attr_e( $options['google'] ); ?>" />
<label class="description abouttxtdescription" for="portafolio_theme_settings[google]"><?php _e( 'Lien vers compte Google+' ); ?></label>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e( 'Flickr' ); ?></th>
<td>
<input id="portafolio_theme_settings[flickr]" class="regular-text" type="text" size="36" name="portafolio_theme_settings[flickr]" value="<?php esc_attr_e( $options['flickr'] ); ?>" />
<label class="description abouttxtdescription" for="portafolio_theme_settings[flickr]"><?php _e( 'Lien vers compte Flickr' ); ?></label>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e( 'Twitter' ); ?></th>
<td>
<input id="portafolio_theme_settings[twitter]" class="regular-text" type="text" size="36" name="portafolio_theme_settings[twitter]" value="<?php esc_attr_e( $options['twitter'] ); ?>" />
<label class="description abouttxtdescription" for="portafolio_theme_settings[twitter]"><?php _e( 'Lien vers compte Twitter' ); ?></label>
</td>
</tr>

</table>
<p class="submit-changes">
<input type="submit" class="button-primary" value="<?php _e( 'Save Options' ); ?>" />
</p>
</form>
</div><!-- END wrap -->

<?php
}
//sanitize and validate
function portafolio_options_validate( $input ) {
	global $select_options, $radio_options;
	if ( ! isset( $input['option1'] ) )
		$input['option1'] = null;
	$input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );
	$input['sometext'] = wp_filter_nohtml_kses( $input['sometext'] );
	if ( ! isset( $input['radioinput'] ) )
		$input['radioinput'] = null;
	if ( ! array_key_exists( $input['radioinput'], $radio_options ) )
		$input['radioinput'] = null;
	$input['sometextarea'] = wp_filter_post_kses( $input['sometextarea'] );

	return $input;
}

?>