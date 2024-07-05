<?php
$queried_object = get_queried_object();
$term_id = $queried_object->term_id;
get_header(); ?>
<main id="main" tabindex="0">
    <section class="s_tax__content">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h3 class="title_small c-red mb-4 mb-md-5"><strong><?php echo $queried_object->name; ?></strong></h3>
                    <p class="p_default pe-0 pe-md-5 mb-5 mb-md-0"><?php echo $queried_object->description; ?></p>
                </div>
                <div class="col col-md-6">
                    <?php if (have_posts()): ?>
                        <div class="row row-cols-2 row-cols-md-3 g-3 g-sm-4">
		                    <?php while (have_posts()): the_post();
			                    $post_id        = get_the_ID();
			                    $video_duration = get_post_meta($post_id, 'bx_play_video_duration', true);
			                    ?>
                                <div class="col">
                                    <div class="card_movie card h-100 mb-4 mb-md-5">
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                            <?php if (has_post_thumbnail()): ?>
                                                <?php the_post_thumbnail('play_thumb', array('class' => 'img-fluid rounded mb-4', 'alt' => get_the_title())); ?>
                                            <?php endif; ?>
                                            <div class="card-body p-0">
                                                <div class="d-flex gap-2 justify-content-start pb-3">
                                                    <span class="badge badge_tax _nobg"><?php echo $video_duration; ?></span>
                                                </div>
                                                <h4 class="title_card"><strong><?php the_title(); ?></strong></h4>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php else: ?>
                        <div class="row">
                            <div class="col">
                                <p class="p_default c-gray2">Nenhum vídeo cadastrado.</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>