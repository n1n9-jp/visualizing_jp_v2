<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
	<meta charset="utf-8">

	<?php // force Internet Explorer to use the latest rendering engine available ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?php wp_title(''); ?></title>

	<?php // mobile meta (hooray!) ?>
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
	<!-- <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png"> -->
	<link rel="apple-touch-icon" href="http://visualizing.jp/assets/apple-touch-icon.png" />
	<link rel="apple-touch-icon" sizes="57x57"   href="<?php echo get_template_directory_uri(); ?>/library/images/favicon/apple-touch-icon-57x57.png" />
	<link rel="apple-touch-icon" sizes="72x72"   href="<?php echo get_template_directory_uri(); ?>/library/images/favicon/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon" sizes="76x76"   href="<?php echo get_template_directory_uri(); ?>/library/images/favicon/apple-touch-icon-76x76.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/library/images/favicon/apple-touch-icon-114x114.png" />
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/library/images/favicon/apple-touch-icon-120x120.png" />
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/library/images/favicon/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/library/images/favicon/apple-touch-icon-152x152.png" />

	<!-- <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png"> -->
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/library/images/favicon/favicon.ico" type="image/x-icon" />
	<!--[if IE]>
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
	<![endif]-->
	<?php // or, set /favicon.ico for IE10 win ?>
	<meta name="msapplication-TileColor" content="#f01d4f">
	<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<!-- Facebook -->
	<meta property="fb:admins" content="649793200" />
	<?php
	if (is_front_page()){
	echo '<meta property="og:type" content="blog" />';echo "\n";
	} else {
	echo '<meta property="og:type" content="article" />';echo "\n";
	}
	?>
	<meta property="og:url" content="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" />
	<?php
	if (is_singular() && ! is_archive() && ! is_front_page() && ! is_home()){//投稿ページ、固定ページの場合
	     if(have_posts()): while(have_posts()): the_post();
	          echo '<meta property="og:title" content="'.the_title("", "", false).'" />';echo "\n";
	          echo '<meta property="og:description" content="'.mb_substr(get_the_excerpt(), 0, 100).'" />';echo "\n";//抜粋を表示
	     endwhile; endif;
	} else {//投稿ページ以外の場合（アーカイブページやホームなど）
	     echo '<meta property="og:title" content="'; bloginfo('name'); echo'" />';echo "\n";
	     echo '<meta property="og:description" content="'; bloginfo('description'); echo '" />';echo "\n";//「一般設定」管理画面で指定したブログの説明文を表示
	}
	?>
	<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
	<?php
	$str = $post->post_content;
	$searchPattern = '/<img.*?src=(["\'])(.+?)\1.*?>/i';//投稿にイメージがあるか調べる
	if (has_post_thumbnail() && ! is_archive() && ! is_front_page() && ! is_home()){//投稿にサムネイルがある場合の処理
	     $image_id = get_post_thumbnail_id();
	     $image = wp_get_attachment_image_src( $image_id, 'full');
	     echo '<meta property="og:image" content="'.$image[0].'" />';echo "\n";
	} else if ( preg_match( $searchPattern, $str, $imgurl ) && ! is_archive() && ! is_front_page() && ! is_home()) {//投稿にサムネイルは無いが画像がある場合の処理
	     echo '<meta property="og:image" content="'.$imgurl[2].'" />';echo "\n";
	} else {//投稿にサムネイルも画像も無い場合、もしくはアーカイブページの処理
	     echo '<meta property="og:image" content="http://visualizing.jp/wp-content/themes/bones/library/images/favicon/ogp.png" />';echo "\n";
	}
	?>
	<!-- /Facebook -->

	<?php // wordpress head functions ?>
	<?php wp_head(); ?>
	<?php // end of wordpress head ?>

	<?php // drop Google Analytics Here ?>
	<?php // end analytics ?>

</head>

<body <?php body_class(); ?>>

	<div id="container">

		<header class="header" role="banner">

			<div id="inner-header" class="wrap cf">

				<div class="m-all t-all d-all">

				    
				    <div id="header-sub" class="m-all t-1of3 d-2of7 last-col cf">
				        <div class="search-form">
				            <?php get_search_form(); ?>
				        </div>
				        <div class="sub-list-text about-link ">
				          <ul>
				            <li><a href="http://visualizing.jp/about/" class="link-internal">visualizing.jpについて</a></li>
				          </ul>
				        </div>
				    </div>


				    <div id="header-main" class="m-all t-2of3 d-5of7 cf">

				    	<!-- logo -->
						<div id="vi">
						  <a class="brand" href="<?php echo home_url(); ?>/">
						    <img src="<?php bloginfo('stylesheet_directory');?>/library/images/logo.png" width="224px" height="43px" title="<?php bloginfo('name'); ?>" alt="<?php bloginfo('name'); ?>" />
						  </a>
						</div>

				    	<!-- main navigation -->
						<nav role="navigation">
							<?php wp_nav_menu(array(
							'container' => false,                           // remove nav container
							'container_class' => 'menu cf',                 // class of container (should you choose to use it)
							'menu' => __( 'Primary Navigation', 'bonestheme' ),  // nav name
							'menu_class' => 'nav top-nav cf',               // adding custom nav class
							'theme_location' => 'main-nav',                 // where it's located in the theme
							'before' => '',                                 // before the menu
						'after' => '',                                  // after the menu
						'link_before' => '',                            // before each link
						'link_after' => '',                             // after each link
						'depth' => 0,                                   // limit the depth of the nav
							'fallback_cb' => ''                             // fallback function (if there is one)
							)); ?>
						</nav>

				    </div>

				</div>

			</div>

		</header>
