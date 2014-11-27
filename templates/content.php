<article id="<?php the_slug(); ?>" <?php post_class(); ?>>
  <header>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php echo pa_post_format_icon(); ?><?php the_title(); ?></a></h2>
  </header>
  <div class="entry-summary">
    <?php the_content(); ?>
  </div>
</article>
