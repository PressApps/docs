<?php
/**
 * Output dynamic CSS at bottom of HEAD
 */
add_action('wp_head','pa_output_css');

function pa_output_css() {
  global $docs;

  $output = '';
  $output .= '.page-header h3 { color: ' . $docs['font_body']['color'] . '; }';
  $output .= '.sharing-link:hover i { color: ' . $docs['primary_color']['regular'] . '; }';
/*
  $output .= '.btn-primary { background-color: ' . $docs['primary_color']['regular'] . '; border-color: ' . $docs['primary_color']['regular'] . '}';
  $output .= '.btn-primary:hover { background-color: ' . $docs['primary_color']['hover'] . '; border-color: ' . $docs['primary_color']['hover'] . '}';
  $output .= '.pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus { background-color: ' . $docs['primary_color']['regular'] . '; border-color: ' . $docs['primary_color']['regular'] . '}';
  $output .= '.pagination > li > a, .pagination > li > a:hover { color: ' . $docs['primary_color']['regular'] . ';}';
 */ 
  if ($docs['autocollapse_doc']) {
    $output .= '.navbar-docs ul ul { display: none; }';
  }

  $width = $docs['banner_width'];
  $output .= '
    .banner {width: ' . $width . 'px;}
    @media only screen and (min-width: 768px) {
      body {padding-left: ' . $width . 'px;}
    }
    @media only screen and (max-width: 767px) {
      .banner {
        width: ' . $width . 'px;
        -webkit-transform: translateX(-' . $width . 'px);
        -moz-transform: translateX(-' . $width . 'px);
        -o-transform: translateX(-' . $width . 'px);
        -ms-transform: translateX(-' . $width . 'px);
        transform: translateX(-' . $width . 'px);
      }
      body.open-menu .wrap {
        pointer-events: none;
        -webkit-transform: translateX(' . $width . 'px);
        -moz-transform: translateX(' . $width . 'px);
        -o-transform: translateX(' . $width . 'px);
        -ms-transform: translateX(' . $width . 'px);
        transform: translateX(' . $width . 'px);
      }
    }
  ';

  $output .= $docs['custom_css'];

  if ( ! empty( $output ) ) {
      echo '<style type="text/css" id="docs-css">' . $output . '</style>';
  }

}