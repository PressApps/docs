<article id="<?php the_slug(); ?>" <?php post_class(); ?>>
  <header>
    <h3 class="entry-title"><?php the_title(); ?></h3>
  </header>
  <div class="entry-summary">
    <?php the_content(); ?>
  </div>
</article>
