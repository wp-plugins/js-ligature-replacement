<?php

// Admin functions for ligatures-js plugin

function js_ligatures_admin_init() {
	register_setting('js_ligatures_options', 'js_ligatures_options', 'js_ligatures_options_validate' );
	add_settings_section('main_section', 'Settings', 'js_ligatures_options_info', __FILE__);
	add_settings_field('ligatures_textarea_string', 'CSS Selectors', 'js_ligatures_textarea', __FILE__, 'main_section');
	add_settings_field('ligatures_extended_checkbox', 'Extended', 'js_ligatures_extended_checkbox', __FILE__, 'main_section');
}

function js_ligatures_admin_menu() {
	add_options_page('Ligatures', 'Ligatures', 'administrator', __FILE__, 'js_ligatures_admin_settings');
}

function js_ligatures_admin_settings() {
?>
	<div class="wrap">
		<div class="icon32" id="icon-options-general"><br></div>
		<h2>Ligatures</h2>
		Enter CSS/jQuery selectors for any text which should have ligatures. See the <a href="http://api.jquery.com/category/selectors/">jQuery documentation</a> for additional info.
		<form action="options.php" method="post">
		<?php settings_fields('js_ligatures_options'); ?>
		<?php do_settings_sections(__FILE__); ?>
		<p class="submit">
			<input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />
		</p>
		</form>
	</div>
<?php	
}

function js_ligatures_textarea() {
	$options = get_option('js_ligatures_options');
	echo "<textarea id='selectors' name='js_ligatures_options[selectors]' rows='7' cols='50' type='textarea'>{$options['selectors']}</textarea>";
}

function js_ligatures_extended_checkbox() {
	$options = get_option('js_ligatures_options');
	if($options['extended']) { $checked = ' checked="checked" '; }
	echo "<input ".$checked." id='js_ligatures_options[extended]' name='js_ligatures_options[extended]' type='checkbox' />";
}

function js_ligatures_options_validate($input) {
	// Check our textbox option field contains no HTML tags - if so strip them out
	$input['selectors'] =  wp_filter_nohtml_kses($input['selectors']);	
	return $input; // return validated input
}

add_action('admin_init', 'js_ligatures_admin_init');
add_action('admin_menu', 'js_ligatures_admin_menu');
