<?php
/*
Template Name: Home
*/
?>

<?php global $docs; ?>
<div class="home-title page-header">
    <?php the_title( '<h1 class="title">', '</h1>' ); ?>
    <?php if ($docs['subtitle']) { ?>
      <h3 class="subtitle"><?php echo $docs['subtitle']; ?></h3>
    <?php } ?>
</div>

<?php
$layout = $docs['home_sections']['Enabled'];

if ($layout): foreach ($layout as $key=>$value) {
 
    switch($key) {
 
        case 'filter': get_template_part( 'templates/filter', 'form' );
        break;
 
        case 'categories': get_template_part( 'templates/section', 'categories' );
        break;
 
        case 'content': get_template_part( 'templates/section', 'content' );
        break;
  
    }
 
}
 
endif;




