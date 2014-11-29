<?php global $helpdesk; ?>
<header class="banner" role="banner">

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
    $order = $helpdesk['banner_order']['Sidebar'];

    if ($order): foreach ($order as $key=>$value) {
     
        switch($key) {
     
            case 'nav': get_template_part( 'templates/header', 'nav' );
            break;
     
            case 'docs': get_template_part( 'templates/header', 'docs' );
            break;

            case 'sidebar': get_template_part( 'templates/header', 'sidebar' );
            break;
     
        }
     
    }
     
    endif;
    ?>
      
  </div>

</header>
