<?php
$banner = bxplay_get_banner();
$filmes = bxplay_get_movies();
$docums = bxplay_get_movies( 'documentarios' );
$series = bxplay_get_movies( 'series' );
get_header(); ?>
<main id="main" tabindex="0">
    <section class="s_home__hero p-0">
        <?php if ($banner->have_posts()): ?>
            <?php while ($banner->have_posts()) : $banner->the_post();
                $post_id        = get_the_ID();
                $banner_url     = get_the_post_thumbnail_url($post_id, 'full');
                $video_duration = get_post_meta($post_id, 'bx_play_video_duration', true);
                $term_names     = wp_get_post_terms($post_id, 'video_type', array('fields' => 'names'));
                ?>

                <div class="hero-banner">
                    <?php if (has_post_thumbnail()): ?>
                        <div class="hero-banner-bg" style="background-image: url('<?php echo $banner_url ?>');"> </div>
                    <?php endif; ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="d-flex gap-2 justify-content-start py-1 py-md-2">
                                    <?php if (!empty($term_names)): ?>
                                        <span class="badge badge_tax me-1"><?php echo $term_names[0]; ?></span>
                                    <?php endif; ?>
                                    <span class="badge badge_tax _nobg"><?php echo $video_duration ?></span>
                                </div>
                                <h2 class="title_large c-white my-3 my-md-4"><strong><?php the_title(); ?></strong></h2>
                                <a class="btn btn_highlight" href="<?php the_permalink(); ?>">Mais informações</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; wp_reset_postdata(); ?>
    </section>
    <section class="s_home__movies">
        <div class="container">
            <?php if ($filmes->have_posts()): ?>
                <div class="row">
                    <div class="col-10 offset-1 col-md-12 offset-md-0">
                        <h3 class="title_small c-red mb-4 mb-md-5"><strong>Filmes</strong></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 offset-1 col-md-12 offset-md-0">
                        <div class="movies_list">
                            <div class="swiper_movies1 swiper">
                                <div class="swiper-wrapper">
                                    <?php while ($filmes->have_posts()) : $filmes->the_post();
	                                    $post_id        = get_the_ID();
	                                    $video_duration = get_post_meta($post_id, 'bx_play_video_duration', true);
                                        ?>
                                        <div class="swiper-slide">
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
    	                                        <?php if (has_post_thumbnail()): ?>
	    	                                        <?php the_post_thumbnail('play_thumb', array('class' => 'img-fluid rounded mb-4', 'alt' => get_the_title())); ?>
	                                            <?php endif; ?>
                                                <div class="d-flex gap-2 justify-content-start pb-3">
	                                                <?php if (!empty($term_names)): ?>
                                                        <span class="badge badge_tax _nobg"><?php echo $video_duration; ?></span>
	                                                <?php endif; ?>
                                                </div>
                                                <h4 class="title_card"><strong><?php the_title(); ?></strong></h4>
                                            </a>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; wp_reset_postdata(); ?>

	        <?php if ($docums->have_posts()): ?>
                <div class="row mt-5 pt-0 pt-md-5">
                    <div class="col-10 offset-1 col-md-12 offset-md-0">
                        <h3 class="title_small c-red mb-5"><strong>Documentários</strong></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 offset-1 col-md-12 offset-md-0">
                        <div class="movies_list">
                            <div class="swiper_movies2 swiper">
                                <div class="swiper-wrapper">
							        <?php while ($docums->have_posts()) : $docums->the_post();
								        $post_id        = get_the_ID();
								        $video_duration = get_post_meta($post_id, 'bx_play_video_duration', true);
								        ?>
                                        <div class="swiper-slide">
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
										        <?php if (has_post_thumbnail()): ?>
											        <?php the_post_thumbnail('play_thumb', array('class' => 'img-fluid rounded mb-4', 'alt' => get_the_title())); ?>
										        <?php endif; ?>
                                                <div class="d-flex gap-2 justify-content-start pb-3">
											        <?php if (!empty($term_names)): ?>
                                                        <span class="badge badge_tax _nobg"><?php echo $video_duration; ?></span>
											        <?php endif; ?>
                                                </div>
                                                <h4 class="title_card"><strong><?php the_title(); ?></strong></h4>
                                            </a>
                                        </div>
							        <?php endwhile; ?>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
	        <?php endif; wp_reset_postdata(); ?>

	        <?php if ($series->have_posts()): ?>
                <div class="row mt-5 pt-0 pt-md-5">
                    <div class="col-10 offset-1 col-md-12 offset-md-0">
                        <h3 class="title_small c-red mb-5"><strong>Séries</strong></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 offset-1 col-md-12 offset-md-0">
                        <div class="movies_list">
                            <div class="swiper_movies3 swiper">
                                <div class="swiper-wrapper">
							        <?php while ($series->have_posts()) : $series->the_post();
								        $post_id        = get_the_ID();
								        $video_duration = get_post_meta($post_id, 'bx_play_video_duration', true);
								        ?>
                                        <div class="swiper-slide">
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
										        <?php if (has_post_thumbnail()): ?>
											        <?php the_post_thumbnail('play_thumb', array('class' => 'img-fluid rounded mb-4', 'alt' => get_the_title())); ?>
										        <?php endif; ?>
                                                <div class="d-flex gap-2 justify-content-start pb-3">
											        <?php if (!empty($term_names)): ?>
                                                        <span class="badge badge_tax _nobg"><?php echo $video_duration; ?></span>
											        <?php endif; ?>
                                                </div>
                                                <h4 class="title_card"><strong><?php the_title(); ?></strong></h4>
                                            </a>
                                        </div>
							        <?php endwhile; ?>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
	        <?php endif; wp_reset_postdata(); ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>