<?php

global $post, $docs;

$section_categories_exclude = '';
$col_class = 6;

$title = $docs['section_categories_title'];
if (isset($docs['section_categories_exclude']) && $docs['section_categories_exclude'] != '') {
    $section_categories_exclude = implode(",", $docs['section_categories_exclude']);
}

$categories = get_categories(array(
    'orderby'         => 'slug',
    'order'           => 'ASC',
    'exclude'         => $section_categories_exclude,
)); 

$categories = wp_list_filter($categories,array('parent'=>0));
?>

<section class="section-categories">
    <?php
    if ($title) {
        echo '<h2 class="section-title">' . $title . '</h2>';
    }
    ?>
    <ul class="filter-list row">
    <?php
    foreach($categories as $category) { 
        
        $term_id        = array();
        $term_id[]      = $category->term_id;

        ?>
        <li class="col-sm-<?php echo $col_class; ?>">
    	    <a href="<?php echo get_category_link($category->term_id); ?>" title="<?php echo $category->name; ?>" class="box">
    	        <h3><?php echo $category->name; ?></h3>
                <?php if ($category->description != '') { ?>
    	           <p><?php echo $category->description; ?></p>
                <?php } ?>
    	    </a>
    	</li>
    <?php		
    }
    wp_reset_query();
    ?>
    </ul>
</section>