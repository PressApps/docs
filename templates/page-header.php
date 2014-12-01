<?php global $docs; ?>
<div class="page-header">
  <h1>
    <?php echo pa_title(); ?>
  </h1>
	<?php if (is_category() && category_description()) {
		echo '<h3>' . category_description() . '</h3>';
	} ?>
	<?php if ($docs['header_filter'] && is_category()) { ?>
	  <?php get_template_part('templates/filter', 'form'); ?>
	<?php } ?>
</div>
