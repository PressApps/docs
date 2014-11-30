<?php if (is_category()) { ?>
  <div class="navbar-docs">
    <ul class="nav" role="tablist">
    <?php
    global $docs;
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
          <li class="menu-title"><a href="#<?php the_slug(); ?>"><?php the_title(); ?></a></li>
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
<?php }
