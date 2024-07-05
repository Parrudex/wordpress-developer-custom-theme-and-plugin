<?php get_header(); ?>
<main id="main" tabindex="0">
    <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post();
		    $post_id        = get_the_ID();
			$video_duration = get_post_meta($post_id, 'bx_play_video_duration', true);
		    $video_ID       = get_post_meta($post_id, 'bx_play_video_ID', true);
		    $term_names     = wp_get_post_terms($post_id, 'video_type', array('fields' => 'names'));
			?>

            <section class="s_single__top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="d-flex gap-2 justify-content-start py-2">
                                <?php if (!empty($term_names)): ?>
                                    <span class="badge badge_tax me-1"><?php echo $term_names[0]; ?></span>
                                <?php endif; ?>
                                <span class="badge badge_tax _nobg"><?php echo $video_duration; ?></span>
                            </div>
                            <h1 class="title_medium c-white my-3 my-md-4"><strong><?php the_title(); ?></strong></h1>
                        </div>
                    </div>
                </div>
            </section>
            <section class="s_single__embed">
                <div class="container">
                    <?php if ($video_ID): ?>
                        <div class="row">
                            <div class="col">
                                <div class="ratio ratio-16x9 rounded mb-5">
                                    <iframe src="https://www.youtube.com/embed/<?php echo $video_ID ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="s_single__content mt-2 mt-md-5">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
	    <?php endwhile; ?>
	<?php endif; ?>
</main>
<?php get_footer(); ?>