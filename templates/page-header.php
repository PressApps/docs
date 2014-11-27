<div class="page-header">
  <h1>
    <?php echo roots_title(); ?>
  </h1>
	<?php if (is_category() && category_description()) {
		echo '<h3>' . category_description() . '</h3>';
	} ?>
</div>
