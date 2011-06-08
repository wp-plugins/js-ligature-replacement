<?php

/*
Plugin Name: JS Ligature Replacement
Description: Ligature replacement using Wyatt Allen's ligature.js script
Version: 1.0
Author: Dave Ross
Author URI: http://davidmichaelross.com/
*/

include "js-ligature-replacement-admin.php";

/**
 * @return void
 */
function js_ligatures_init() {
  wp_enqueue_script('jquery');
  wp_enqueue_script('ligature-js', plugin_dir_url(__FILE__).'ligature.js', 'jquery');
}

function js_ligatures_head() {
  $options = get_option('ligatures_options');
  $selectors = explode("\n", $options['selectors']);
  if($options['extended'] || 1) {
    $extended = 'true';
  }
  else {
    $extended = 'false';
  }
  echo '<script type="text/javascript"> jQuery(function() { ';
  
  foreach($selectors as $selector) {
  	$selector = trim($selector);
  	echo "jQuery('{$selector}').each( function() { ligature({$extended}, this) });\n";  	
  }
  echo '});</script>'."\n";
}

add_action('init', 'js_ligatures_init');
add_action('wp_head', 'js_ligatures_head');
