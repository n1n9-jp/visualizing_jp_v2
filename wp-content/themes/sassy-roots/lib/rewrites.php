<?php
/**
 * URL rewriting
 *
 * Rewrites do not happen for multisite installations or child themes
 *
 * Rewrite:
 *   /wp-content/themes/themename/css/ to /css/
 *   /wp-content/themes/themename/js/  to /js/
 *   /wp-content/themes/themename/img/ to /img/
 *   /wp-content/plugins/              to /modules/
 *
 * If you aren't using Apache, alternate configuration settings can be found in the docs.
 *
 * @link https://github.com/retlehs/roots/blob/master/doc/rewrites.md
 */
function roots_add_rewrites($content) {
  global $wp_rewrite;
  $roots_new_non_wp_rules = array(
    'css/(.*)'      => THEME_PATH . '/css/$1',
    'js/(.*)'       => THEME_PATH . '/js/$1',
    'img/(.*)'      => THEME_PATH . '/img/$1',
    'modules/(.*)'  => RELATIVE_PLUGIN_PATH . '/$1'
  );
  $wp_rewrite->non_wp_rules = array_merge($wp_rewrite->non_wp_rules, $roots_new_non_wp_rules);
  return $content;
}

function roots_clean_urls($content) {
  if (strpos($content, RELATIVE_PLUGIN_PATH) > 0) {
    return str_replace('/' . RELATIVE_PLUGIN_PATH,  '/modules', $content);
  } else {
    return str_replace('/' . THEME_PATH, '', $content);
  }
}

if (!is_multisite() && !is_child_theme()) {
  if (current_theme_supports('rewrites')) {
    add_action('generate_rewrite_rules', 'roots_add_rewrites');
  }

  if (!is_admin() && current_theme_supports('rewrites')) {
    $tags = array(
      'plugins_url',
      'bloginfo',
      'stylesheet_directory_uri',
      'template_directory_uri',
      'script_loader_src',
      'style_loader_src'
    );

    add_filters($tags, 'roots_clean_urls');
  }
}
