<header class="banner navbar navbar-static-top" role="banner">
  <div class="navbar-inner">

    <div class="clear"></div>
    
    <div class="grid_9">
      <div id="header-main">

        <div id="vi">
            <a class="brand" href="<?php echo home_url(); ?>/">
              <img src="<?php bloginfo('stylesheet_directory');?>/css/img/logo.png" width="224px" height="43px" title="<?php bloginfo('name'); ?>" alt="<?php bloginfo('name'); ?>" />
            </a>
        </div>

        <nav class="nav-main nav-collapse collapse" role="navigation">
          <?php
            if (has_nav_menu('primary_navigation')) :
              wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav'));
            endif;
          ?>
        </nav>

      </div>
    </div>

    <div class="grid_3">
      <div id="header-sub">
          <div class="search-form">
              <?php get_search_form(); ?>
          </div>
          <div class="sub-list-text about-link">
            <ul>
              <li><a href="http://localhost:8888/visualizing_jp/about/">visualizing.jpについて</a></li>
            </ul>
          </div>
      </div>
    </div>

    <div class="clear"></div>
    
  </div>
</header>