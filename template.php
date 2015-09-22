<?php

/**
 * Implements hook_theme_preprocess_page().
 */
function arsls_theme_preprocess_page(&$variables) {
  // Add in the seach bar.
  $search_form             = drupal_get_form( 'search_form' );
  $search_form_box         = drupal_render( $search_form );
  $variables['search_box'] = $search_form_box;

  // Add font awesome cdn.
  drupal_add_css( '//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css' , array(
      'type' => 'external',
  ) );
}
