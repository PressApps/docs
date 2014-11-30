<?php

$redux_opt_name = "docs";

if ( !function_exists( "redux_add_metaboxes" ) ):
    function redux_add_metaboxes($metaboxes) {

    $homeSorter = array();
    $homeSorter[] = array(
        'icon_class' => 'icon-large',
        'icon' => 'el-icon-home',
        'fields' => array(
            array(
                'id'       => 'home_sections',
                'type'     => 'sorter',
                'compiler' => 'true',
                'options'  => array(
                    'Enabled'  => array(
                        'filter' => 'Filter',
                        'categories'     => 'Categories',
                        'content' => 'Content',
                    ),
                    'Disabled' => array(),
                ),
            ),
            array(
                'id'       => 'subtitle',
                'type'     => 'text',
                'title'    => __( 'Subtitle', 'redux-framework-demo' ),
            ),
        )
    );
      
    $metaboxes[] = array(
        'id' => 'home-layout-metabox',
        'title' => __('Page Options', 'pressapps'),
        'post_types' => array('page'),
        'page_template' => array('template-home.php'),
        'position' => 'normal', // normal, advanced, side
        'priority' => 'core', // high, core, default, low
        'sections' => $homeSorter
    );

    $homeTemplate[] = array(
        'title' => __('Categories Options', 'redux-framework-demo'),
        'icon_class' => 'icon-large',
        'icon' => 'el-icon-minus',
        'fields' => array(
            array(
                'title'     => __( 'Title', 'shoestrap' ),
                'id'        => 'section_categories_title',
                'default'   => 'Browse Documents',
                'type'      => 'text'
            ),
            array(
                'id'        => 'section_categories_include',
                'title'     => __('Categories', 'redux-framework-demo'),
                'type'      => 'select',
                'data'      => 'categories',
                'multi'     => true,
                'desc'      => __('Select categories to display in section (If none selected all categories will be displayed).', 'redux-framework-demo'),
            ),
        )
    );

    $metaboxes[] = array(
        'id' => 'home-metabox',
        'title' => __('Category Options', 'pressapps'),
        'post_types' => array('page'),
        'page_template' => array('template-home.php'),
        'position' => 'normal', // normal, advanced, side
        'priority' => 'core', // high, core, default, low
        'sections' => $homeTemplate
    );

    $boxStyle = array();
    $boxStyle[] = array(
        'icon_class' => 'icon-large',
        'icon' => 'el-icon-home',
        'fields' => array(
            array(
                'id'       => 'style_ol',
                'type'     => 'switch',
                'title'    => __( 'Ordered List', 'redux-framework-demo' ),
                'desc'     => __( 'Style ordered list.', 'redux-framework-demo' ),
                'default'  => '0'
            ),
        )
    );
  
    $metaboxes[] = array(
        'id' => 'post-style',
        'title' => __('Style Options', 'pressapps'),
        'post_types' => array('post', 'page'),
        'position' => 'normal', // normal, advanced, side
        'priority' => 'core', // high, core, default, low
        'sections' => $boxStyle
    );

    // Kind of overkill, but ahh well.  ;)
    //$metaboxes = apply_filters( 'your_custom_redux_metabox_filter_here', $metaboxes );

    return $metaboxes;
  }
  add_action('redux/metaboxes/'.$redux_opt_name.'/boxes', 'redux_add_metaboxes');
endif;

// The loader will load all of the extensions automatically based on your $redux_opt_name
require_once(dirname(__FILE__).'/loader.php');
