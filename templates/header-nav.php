<?php
if (has_nav_menu('primary_navigation_left')) :
	wp_nav_menu(array('theme_location' => 'primary_navigation_left', 'menu_class' => ' nav menu-primary'));
endif;
