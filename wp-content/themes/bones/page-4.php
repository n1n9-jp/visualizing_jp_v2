<?php get_header(); ?>

      <div id="content">
        <div id="inner-content" class="wrap cf">


            <div id="main" class="m-all t-2of3 d-5of7 cf" role="main">

                <section class="topMainColumn">
                    <ul>
                        <?php
                        $newslist = get_posts( array(
                        'posts_per_page' => 8
                        )); 
                        foreach( $newslist as $post ): 
                            setup_postdata( $post );
                        ?>

                        <li>
                          <a href="<?php the_permalink(); ?>" class="home-article">
                            <div class="postThumbnail"><?php the_post_thumbnail( 'bones-thumb-340' ); ?></div>
                            <h2><?php the_title(); ?></h2>
                          </a>
                          <time class="byline updated" datetime="<?php echo get_the_time('c'); ?>" pubdate><i class="fa fa-clock-o"></i> <?php echo sprintf(__('%s %s', 'roots'), get_the_date(), get_the_time()); ?></time>
                          <p class="byline author vcard"><i class="fa fa-pencil"></i> by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?php echo get_the_author(); ?></a></p>
                        </li>
                        <?php
                        endforeach;
                        wp_reset_postdata();
                        ?>
                     </ul>
                </section>

            </div>


            <?php get_sidebar(); ?>

        </div>
      </div>

<?php get_footer(); ?>