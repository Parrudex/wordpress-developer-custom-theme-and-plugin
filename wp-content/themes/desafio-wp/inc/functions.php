<?php defined('ABSPATH') || exit;

function bxplay_get_banner($_args = array())
{
	$args = array_merge( array(
		'post_type'      => 'video',
		'posts_per_page' => 1,
		'orderBy'        => 'date',
		'order'          => 'DESC'
	), $_args );
	return new WP_Query($args);
}

function bxplay_get_movies($terms = 'filmes')
{
	$args = array(
		'post_type'      => 'video',
		'posts_per_page' => 10,
		'tax_query' => array(
			array(
				'taxonomy' => 'video_type',
				'field'    => 'slug',
				'terms'    => $terms,
			),
		),
	);
	return new WP_Query($args);
}