<?php
global $docs;

/**
 * Docs initial setup and constants
 */
function theme_setup() {
  // Make theme available for translation
  load_theme_textdomain('pressapps', get_template_directory() . '/lang');

  // Register wp_nav_menu() menus
  register_nav_menus(array(
    'primary_navigation' => __('Primary Navigation', 'pressapps'),
  ));

  // Add HTML5 markup for captions
  add_theme_support('html5', array('caption', 'comment-form', 'comment-list'));

  // Tell the TinyMCE editor to use a custom stylesheet
  add_editor_style('/assets/css/editor-style.css');
}
add_action('after_setup_theme', 'theme_setup');

/**
 * Register sidebars
 */
function pa_widgets_init() {
  register_sidebar(array(
    'name'          => __('Primary', 'pressapps'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<div class="widget %1$s %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));

}
add_action('widgets_init', 'pa_widgets_init');

/**
 * Configuration values
 */
define('GOOGLE_ANALYTICS_ID', $docs['analytics_id']); 

if (!defined('WP_ENV')) {
  define('WP_ENV', 'production');  // scripts.php checks for values 'production' or 'development'
}

/**
 * $content_width is a global variable used by WordPress for max image upload sizes
 * and media embeds (in pixels).
 */
if (!isset($content_width)) { $content_width = 1140; }

/**
 * Page titles
 */
function pa_title() {
  if (is_home()) {
    if (get_option('page_for_posts', true)) {
      return get_the_title(get_option('page_for_posts', true));
    } else {
      return __('Latest Posts', 'pressapps');
    }
  } elseif (is_archive()) {
    $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
    if ($term) {
      return apply_filters('single_term_title', $term->name);
    } elseif (is_post_type_archive()) {
      return apply_filters('the_title', get_queried_object()->labels->name);
    } elseif (is_day()) {
      return sprintf(__('Daily Archives: %s', 'pressapps'), get_the_date());
    } elseif (is_month()) {
      return sprintf(__('Monthly Archives: %s', 'pressapps'), get_the_date('F Y'));
    } elseif (is_year()) {
      return sprintf(__('Yearly Archives: %s', 'pressapps'), get_the_date('Y'));
    } elseif (is_author()) {
      $author = get_queried_object();
      return sprintf(__('Author Archives: %s', 'pressapps'), apply_filters('the_author', is_object($author) ? $author->display_name : null));
    } else {
      return single_cat_title('', false);
    }
  } elseif (is_search()) {
    return sprintf(__('Search Results for %s', 'pressapps'), get_search_query());
  } elseif (is_404()) {
    return __('Not Found', 'pressapps');
  } else {
    return get_the_title();
  }
}

/**
 * // Tell WordPress to use searchform.php from the templates/ directory
 */
function pa_get_search_form($form) {
  $form = '';
  locate_template('/templates/searchform.php', true, false);
  return $form;
}
add_filter('get_search_form', 'pa_get_search_form');

/**
 * Add page slug to body_class() classes if it doesn't exist
 */
function pa_body_class($classes) {
  // Add post/page slug
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }
  return $classes;
}
add_filter('body_class', 'pa_body_class');

/**
 * Clean up the_excerpt()
 */
function pa_excerpt_more($more) {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'pressapps') . '</a>';
}
add_filter('excerpt_more', 'pa_excerpt_more');

/**
 * Manage output of wp_title()
 */
function pa_wp_title($title) {
  if (is_feed()) {
    return $title;
  }

  $title .= get_bloginfo('name');

  return $title;
}
add_filter('wp_title', 'pa_wp_title', 10);

/**
 * Add custom favicon to head
 */
function pa_add_favicon(){ 
  global $docs;
  ?>
  <!-- Custom Favicons -->
  <link rel="shortcut icon" href="<?php echo $docs['favicon']['url']; ?>"/>
  <?php }
add_action('wp_head','pa_add_favicon');

/**
 * Pagination
 */
function page_navi($before = '', $after = '') {
  global $wpdb, $wp_query;
  $request = $wp_query->request;
  $posts_per_page = intval(get_query_var('posts_per_page'));
  $paged = intval(get_query_var('paged'));
  $numposts = $wp_query->found_posts;
  $max_page = $wp_query->max_num_pages;
  if ( $numposts <= $posts_per_page ) { return; }
  if(empty($paged) || $paged == 0) {
    $paged = 1;
  }
  $pages_to_show = 7;
  $pages_to_show_minus_1 = $pages_to_show-1;
  $half_page_start = floor($pages_to_show_minus_1/2);
  $half_page_end = ceil($pages_to_show_minus_1/2);
  $start_page = $paged - $half_page_start;
  if($start_page <= 0) {
    $start_page = 1;
  }
  $end_page = $paged + $half_page_end;
  if(($end_page - $start_page) != $pages_to_show_minus_1) {
    $end_page = $start_page + $pages_to_show_minus_1;
  }
  if($end_page > $max_page) {
    $start_page = $max_page - $pages_to_show_minus_1;
    $end_page = $max_page;
  }
  if($start_page <= 0) {
    $start_page = 1;
  }
    
  echo $before.'<nav class="text-center"><ul class="pagination pagination-sm">'."";
    
  $prevposts = get_previous_posts_link('&larr;');
  if($prevposts) { echo '<li>' . $prevposts  . '</li>'; }
  
  for($i = $start_page; $i  <= $end_page; $i++) {
    if($i == $paged) {
      echo '<li class="active"><a href="#">'.$i.'</a></li>';
    } else {
      echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
    }
  }
  echo '<li class="">';
  next_posts_link('&rarr;');
  echo '</li>';
  echo '</ul>'.$after."</nav>";
}

/**
 * Styled elements
 */
function pa_style_tag() {
  global $docs;
  $class = '';
  if ($docs['style_ol']) {
    $class .= ' style-ol';
  }
  echo $class;
}


/**
 * Display all post on category page
 */
function filter_query( $query ) {
  if ( is_category() ) {
      $query->set( 'posts_per_page', -1 );
    return;
  }
}
add_action( 'pre_get_posts', 'filter_query', 1 );

/**
 * Get the slug
 */
function the_slug($echo=true){
  $slug = basename(get_permalink());
  do_action('before_slug', $slug);
  $slug = apply_filters('slug_filter', $slug);
  if( $echo ) echo $slug;
  do_action('after_slug', $slug);
  return $slug;
}

