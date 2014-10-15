<?php get_header(); ?>
	<div id="content">
		<div id="inner-content" class="wrap cf">

				<div id="main" class="m-all t-2of3 d-5of7 cf" role="main">

						<div class="archive-main m-2of3 t-2of3 d-2of3 cf">

									<?php if (is_category()) { ?>
										<h1 class="archive-title h2">
											<span><?php _e( 'Posts Categorized:', 'bonestheme' ); ?></span> <?php single_cat_title(); ?>
										</h1>

									<?php } elseif (is_tag()) { ?>
										<h1 class="archive-title h2">
											<span><?php _e( 'Posts Tagged:', 'bonestheme' ); ?></span> <?php single_tag_title(); ?>
										</h1>

									<?php } elseif (is_author()) {
										global $post;
										$author_id = $post->post_author;
									?>
										<h1 class="archive-title h2">

											<span><?php _e( 'Posts By:', 'bonestheme' ); ?></span> <?php the_author_meta('display_name', $author_id); ?>

										</h1>
									<?php } elseif (is_day()) { ?>
										<h1 class="archive-title h2">
											<span><?php _e( 'Daily Archives:', 'bonestheme' ); ?></span> <?php the_time('l, F j, Y'); ?>
										</h1>

									<?php } elseif (is_month()) { ?>
											<h1 class="archive-title h2">
												<span><?php _e( 'Monthly Archives:', 'bonestheme' ); ?></span> <?php the_time('F Y'); ?>
											</h1>

									<?php } elseif (is_year()) { ?>
											<h1 class="archive-title h2">
												<span><?php _e( 'Yearly Archives:', 'bonestheme' ); ?></span> <?php the_time('Y'); ?>
											</h1>
									<?php } ?>

									<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


									<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

										<header class="article-header">
											<div class="entry-tag"><?php the_tags('<ul class="entry-tags"><li><i class="fa fa-tag"></i>','</li><li><i class="fa fa-tag"></i>','</li></ul>'); ?></div>
											<div class="postThumbnail"><?php the_post_thumbnail( 'bones-thumb-440' ); ?></div>
											<h3 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
											<time class="byline updated" datetime="<?php echo get_the_time('c'); ?>" pubdate><i class="fa fa-clock-o"></i> <?php echo sprintf(__('%s %s', 'roots'), get_the_date(), get_the_time()); ?></time>
											<p class="byline author vcard"><i class="fa fa-pencil"></i> <?php echo __('by', 'roots'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?php echo get_the_author(); ?></a></p>
										</header>

										<section class="entry-content cf">
											<?php the_excerpt(); ?>
										</section>

										<footer class="article-footer">
										</footer>

									</article>


									<?php endwhile; ?>
											<?php bones_page_navi(); ?>
									<?php else : ?>
											<article id="post-not-found" class="hentry cf">
												<header class="article-header">
													<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
												</header>
												<section class="entry-content">
													<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
												</section>
												<footer class="article-footer">
														<p><?php _e( 'This is the error message in the archive.php template.', 'bonestheme' ); ?></p>
												</footer>
											</article>
									<?php endif; ?>

						</div>




						<div class="archive-sub m-1of3 t-1of3 d-1of3 cf">


							<!----------------------------------------
								Banner
							---------------------------------------->
							<section class="widget archives-2 widget_archive">
							<div class="widget-inner">

							    <!-- カテゴリーごとに打ち出す内容を変える -->
							    <?php if(in_category('framework')): ?>
							        <ul class="sub-list-banner">
							          <li><a href="/visualizing_jp/tag/d3/"><img src="<?php bloginfo('stylesheet_directory');?>/css/img/banner-d3.png" width="218px" height="60px" title="D3" /></a></li>
							          <!--
							          <li><a href="/visualizing_jp/tag/processing/"><img src="<?php bloginfo('stylesheet_directory');?>/css/img/banner-p5.png" width="218px" height="60px" title="processing" /></a></li>
							          <li><a href="/visualizing_jp/tag/openframeworks/"><img src="<?php bloginfo('stylesheet_directory');?>/css/img/banner-of.png" width="218px" height="60px" title="openFrameworks" /></a></li>
							          -->
							        </ul>
							    <?php elseif(in_category('event')): ?>
							        <ul class="sub-list-banner">
							          <li><a href="http://wired.jp/conference2013/" target="_blank"><img src="<?php bloginfo('stylesheet_directory');?>/css/img/wired_conf_banner_300-250.jpg" width="220" title="WIRED CONFERENCE 2013 OPEN GOVERNMENT 未来の政府を考える" /></a></li> 
							          <li><a href="http://okfn.jp/home/events/eventcalendar/"><img src="<?php bloginfo('stylesheet_directory');?>/css/img/banner-opendata_event_cal.png" width="220" height="60" title="オープンデータ・イベント・カレンダー" /></a></li>
							        </ul>
							    <?php else: ?>
							    <?php endif; ?>

							</div>
							</section>    
							

							<!----------------------------------------
								Other Article
							---------------------------------------->
							<section class="widget categories-2 widget_categories">
							<div class="widget-inner">
							       <?php
							         $newslist = get_posts( array(
							          'posts_per_page' => 10, //取得記事件数
							          'orderby' => 'rand'
							        ));
							          foreach( $newslist as $post ):
							          setup_postdata( $post );
							        ?>
							        <h3>その他の記事</h3>

							        <ul class="sub-article-list">
							            <li><a href="<?php the_permalink() ?>">
							              <div class="postThumbnail"><?php the_post_thumbnail( array(210, 91) ); ?></div>
							              <?php the_title(); ?>
							            </a></li>
							        <?php
							          endforeach;
							          wp_reset_postdata();
							        ?>
							        </ul>
							</div>
							</section>


							<!----------------------------------------
								Category Link
							---------------------------------------->
							<section class="widget categories-2 widget_categories">
							<div class="widget-inner">
							        <h3>カテゴリー</h3>
							        <ul class="sub-category-list">
							          <li class="cat-item"><a href="http://localhost:8888/visualizing_jp/category/dataset/" title="「データセット」に含まれる投稿をすべて表示">データセット</a>
							          </li>
							          <li class="cat-item"><a href="http://localhost:8888/visualizing_jp/category/method/" title="「メソッド」に含まれる投稿をすべて表示">メソッド</a>
							          </li>
							          <li class="cat-item"><a href="http://localhost:8888/visualizing_jp/category/framework/" title="「フレームワーク」に含まれる投稿をすべて表示">フレームワーク</a>
							          </li>
							          <li class="cat-item"><a href="http://localhost:8888/visualizing_jp/category/showcase/" title="「ショーケース」に含まれる投稿をすべて表示">ショーケース</a>
							          </li>
							          <li class="cat-item"><a href="http://localhost:8888/visualizing_jp/category/event/" title="「イベント」に含まれる投稿をすべて表示">イベント</a>
							          </li>
							        </ul>
							</div>
							</section>


						</div>

				</div>

			<?php get_sidebar(); ?>

		</div>
	</div>
<?php get_footer(); ?>