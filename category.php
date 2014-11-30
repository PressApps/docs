<?php
global $docs;
?>
<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'pressapps'); ?>
  </div>
<?php endif; ?>

<?php
/**
 * Subcategories
 */
if (isset($docs['exlude_cats']) && $docs['exlude_cats'] != '') {
  $exlude_cats = implode(",", $docs['exlude_cats']);
} else {
  $exlude_cats = 'list';
}


$sub_category_id = get_query_var('cat');
$subcat_args = array(
  'child_of' => $sub_category_id,
  'exclude' => $exlude_cats,
);
$sub_categories = get_categories($subcat_args); 
$sub_categories = wp_list_filter($sub_categories,array('parent'=>$sub_category_id));
?>
<ul class="filter-list">
<?php if ($sub_categories) { ?>
  
    <?php foreach($sub_categories as $sub_category) {  ?>
	    <h2 class="cat-title" id="<?php echo $sub_category->slug; ?>"><?php echo $sub_category->name ?></h2>
      <?php if ($sub_category->description) {
        //echo '<h4 class="cat-subtitle">' . $sub_category->description . '</h4>';
      } ?>

	    <?php 
	    $cat_posts = get_posts(array(
			'orderby' => 'ID',
			'order' => 'DESC',
      'numberposts'   => -1,
      'cat'  => $sub_category->term_id,
	    ));

	    foreach($cat_posts as $post){
	      setup_postdata($post);
	      ?>
			<li><?php get_template_part('templates/content', 'doc'); ?></li>
	      <?php
	    }
	    ?>
    <?php } ?> 

<?php } else { ?>

  <?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/content', 'doc'); ?>
  <?php endwhile; ?>

<?php } ?> 
</ul>
<a class="scroll-top" href="#top"><?php _e('Back To Top', 'pressapps'); ?></a>
