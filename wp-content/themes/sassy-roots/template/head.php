<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>

<meta charset="utf-8">
<title><?php wp_title('-', true, 'right'); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="http://visualizing.jp/assets/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="http://visualizing.jp/assets/apple-touch-icon.png" />
<link rel="apple-touch-icon" sizes="57x57" href="http://visualizing.jp/assets/apple-touch-icon-57x57.png" />
<link rel="apple-touch-icon" sizes="60x60" href="http://visualizing.jp/assets/apple-touch-icon-60x60.png" />
<link rel="apple-touch-icon" sizes="72x72" href="http://visualizing.jp/assets/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon" sizes="76x76" href="http://visualizing.jp/assets/apple-touch-icon-76x76.png" />
<link rel="apple-touch-icon" sizes="114x114" href="http://visualizing.jp/assets/apple-touch-icon-114x114.png" />
<link rel="apple-touch-icon" sizes="120x120" href="http://visualizing.jp/assets/apple-touch-icon-120x120.png" />
<link rel="apple-touch-icon" sizes="144x144" href="http://visualizing.jp/assets/apple-touch-icon-144x144.png" />
<link rel="apple-touch-icon" sizes="152x152" href="http://visualizing.jp/assets/apple-touch-icon-152x152.png" />

<?php wp_head(); ?>

<?php if (wp_count_posts()->publish > 0) : ?>
	<link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">
<?php endif; ?>

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
	     echo '<meta property="og:image" content="http://visualizing.jp/assets/ogp.png" />';echo "\n";
	}
?>
<!-- OGP -->

</head>