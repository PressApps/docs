<?php global $docs; ?>
<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>
    <div class="entry-content<?php echo pa_style_tag($post->ID); ?>">
      <?php the_content(); ?>
    </div>
    <footer>
      <?php get_template_part('templates/entry-meta'); ?>
    </footer>

    <?php comments_template( '/templates/comments.php' ); ?>

  </article>
<?php endwhile; ?>
