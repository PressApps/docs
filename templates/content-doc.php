<article id="<?php the_slug(); ?>" <?php post_class(); ?>>
  <header>
    <h3 class="entry-title"><?php the_title(); ?>
		<a href="#<?php the_slug(); ?>" class="sharing-link" title="Link to this document section"><i class="icon-link"></i></a>
    </h3>
  </header>
  <div class="entry-summary">
    <?php the_content(); ?>
  </div>
</article>

