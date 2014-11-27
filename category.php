<?php
?>
<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
  </div>
<?php endif; ?>



<?php
/**
 * Subcategories
 */
$sub_category_id = get_query_var('cat');
$subcat_args = array(
  'child_of' => $sub_category_id,
);
$sub_categories = get_categories($subcat_args); 
$sub_categories = wp_list_filter($sub_categories,array('parent'=>$sub_category_id));
?>

<?php if ($sub_categories) { ?>
  
    <?php foreach($sub_categories as $sub_category) {  ?>
	    <h2 id="<?php echo $sub_category->slug; ?>"><?php echo $sub_category->name ?></h2>
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
			<?php get_template_part('templates/content', 'doc'); ?>
	      <?php
	    }
	    ?>
    <?php } ?> 

<?php } else { ?>

  <?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/content', 'doc'); ?>
  <?php endwhile; ?>

<?php } ?>  