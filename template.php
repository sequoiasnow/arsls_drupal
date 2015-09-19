<?php

/**
 * Implements hook_theme_preprocess_page().
 */
function arsls_theme_preprocess_page(&$vars) {
  if($vars['is_front']) {
    # Add the javascript for the splashpage.
    drupal_add_js(drupal_get_path('theme', 'arsls_theme') . '/js/splashpage.js', array(
		'weight' => 10000,
	    'scope'  => 'header',
	    'group'  => JS_THEME,
	));

    # Add the main menu to the page.
	$vars['main_menu'] = menu_main_menu();

	# add the javascript for the FAQ animation -- needs a fix.
//	drupal_add_js(drupal_get_path('theme', 'arsls_theme') . '/js/action_html.js');
  } else if ((isset($vars['node']) && $vars['node']->type == 'animated_push_reveal') || (isset($vars['type']) && $vars['type'] == 'animated_push_reveal')) {
        drupal_add_js(drupal_get_path('theme', 'arsls_theme') . '/js/action_html.js');
  }
}
