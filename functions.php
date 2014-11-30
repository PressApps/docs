<?php
/**
 * PressApps includes
 *
 * The $pa_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 */

define('OPT_NAME', 'docs');

/**
 * Core files
 */
$pa_includes = array(
  'lib/extensions/extensions.php',  // Metaboxes
  'lib/options.php',                // Theme Options
  'lib/init.php',                   // Theme setup and functions
  'lib/wrapper.php',                // Theme wrapper class
  'lib/dependencies.php',           // Install deoendency plugins
  'lib/scripts.php',                // Scripts and stylesheets
  'lib/reorder.php',                // Reorder
  'lib/dynamic-css.php',            // Custom CSS
);

foreach ($pa_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'pressapps'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);
