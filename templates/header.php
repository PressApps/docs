<?php global $helpdesk; ?>
<header class="banner js-toggle-menu" role="banner">

  <ul class="toggle-menu">
    <li></li>
    <li></li>
    <li></li>
  </ul>

  <div class="header-wrap">
    
    <?php if ($helpdesk['logo']['url']) { ?>
      <a class="navbar-brand-img" title="<?php bloginfo('name'); ?>" href="<?php echo home_url(); ?>"><img src="<?php echo $helpdesk['logo']['url']; ?>" alt="<?php bloginfo('name'); ?>"/></a>
    <?php } else { ?>
      <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
    <?php } ?>

    <?php
      if (has_nav_menu('primary_navigation_left')) :
        wp_nav_menu(array('theme_location' => 'primary_navigation_left', 'menu_class' => ' nav menu-primary'));
      endif;
    ?>

    <div class="navbar-docs">
      <ul class="nav" role="tablist">
      <?php
      $sub_category_id = get_query_var('cat');
      $subcat_args = array(
        'child_of' => $sub_category_id,
      );
      $sub_categories = get_categories($subcat_args); 
      $sub_categories = wp_list_filter($sub_categories,array('parent'=>$sub_category_id));
      ?>

      <?php if ($sub_categories) { ?>
        
        <?php foreach($sub_categories as $sub_category) {  ?>
          <li class="menu-title">
          <a href="#<?php echo $sub_category->slug; ?>"><?php echo $sub_category->name ?></a>
          <ul class="nav sub-menu">
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
            <li class="menu-title"><a href="#<?php the_slug(); ?>"><span></span><?php the_title(); ?></a></li>
            <?php
          }
          ?>
          </ul>
          </li>
        <?php } ?> 

      <?php } else { ?>

        <?php while (have_posts()) : the_post(); ?>
          <li class="menu-title"><a href="#<?php the_slug(); ?>"><?php the_title(); ?></a></li>
        <?php endwhile; ?>

      <?php } ?>  
      </ul>
    </div>
    
  </div>

</header>
