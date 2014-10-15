<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">



						<div id="main" class="m-all t-2of3 d-5of7 cf" role="main">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

				                <header class="article-header">
				                  <div class="entry-tag"><?php the_tags('<ul class="entry-tags"><li><i class="icon-tag"></i>','</li><li><i class="icon-tag"></i>','</li></ul>'); ?></div>
				                  <div class="postThumbnail"><?php the_post_thumbnail( 'bones-thumb-440' ); ?></div>
				                    <h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
				                  <time class="byline updated" datetime="<?php echo get_the_time('c'); ?>" pubdate><i class="icon-time"></i> <?php echo sprintf(__('%s %s', 'roots'), get_the_date(), get_the_time()); ?></time>
				                  <p class="byline author vcard"><i class="icon-pencil"></i> by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?php echo get_the_author(); ?></a></p>
				                </header> <?php // end article header ?>

								<section class="entry-content cf" itemprop="articleBody">
									<?php
										// the content (pretty self explanatory huh)
										the_content();

										/*
										 * Link Pages is used in case you have posts that are set to break into
										 * multiple pages. You can remove this if you don't plan on doing that.
										 *
										 * Also, breaking content up into multiple pages is a horrible experience,
										 * so don't do it. While there are SOME edge cases where this is useful, it's
										 * mostly used for people to get more ad views. It's up to you but if you want
										 * to do it, you're wrong and I hate you. (Ok, I still love you but just not as much)
										 *
										 * http://gizmodo.com/5841121/google-wants-to-help-you-avoid-stupid-annoying-multiple-page-articles
										 *
										*/
										wp_link_pages( array(
											'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bonestheme' ) . '</span>',
											'after'       => '</div>',
											'link_before' => '<span>',
											'link_after'  => '</span>',
										) );
									?>
								</section> <?php // end article section ?>


								<footer class="article-footer cf">
								</footer>


							</article>



							<?php endwhile; else : ?>
									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<!--
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page.php template.', 'bonestheme' ); ?></p>
										</footer>
										-->
									</article>
							<?php endif; ?>

						</div>

						<?php get_sidebar(); ?>

				</div>

			</div>

<?php get_footer(); ?>