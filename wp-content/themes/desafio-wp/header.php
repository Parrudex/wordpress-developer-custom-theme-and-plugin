<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-language" content="pt-br">
    <title><?php
		global $page, $paged;
		wp_title( '|', true, 'right' );
		bloginfo( 'name' );
		$site_description = get_bloginfo('description', 'display');
		if ($site_description && (is_home() || is_front_page()))
			echo " | $site_description";
		?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta name="author" content="<?php bloginfo('name'); ?>">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico">
    <link rel="icon" type="image/x-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/safari-pinned-tab.svg" color="#121212">
    <meta name="apple-mobile-web-app-title" content="Play">
    <meta name="application-name" content="Play">
    <meta name="msapplication-TileColor" content="#121212">
    <meta name="theme-color" content="#121212">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <nav class="navbar__main navbar navbar-expand-md fixed-top">
        <div class="container justify-content-center justify-content-md-between">
            <a class="navbar-brand" href="<?php echo site_url() ?>">
                <img src="<?php bloginfo('template_directory') ?>/assets/images/logo-play.svg" class="img-fluid" alt="Plataforma Play" title="Plataforma Play">
            </a>
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link px-4<?php echo is_tax('video_type', 'filmes') ? ' active' : '' ?>" href="<?php echo get_term_link('filmes', 'video_type') ?>">Filmes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-4<?php echo is_tax('video_type', 'documentarios') ? ' active' : '' ?>" href="<?php echo get_term_link('documentarios', 'video_type') ?>">Documentários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-4<?php echo is_tax('video_type', 'series') ? ' active' : '' ?>" href="<?php echo get_term_link('series', 'video_type') ?>">Séries</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <nav class="navbar__mobile d-flex d-md-none justify-content-around">
        <a class="navbar__mobile_icon d-flex flex-column justify-content-center align-items-center<?php echo is_tax('video_type', 'filmes') ? ' active' : '' ?>" href="<?php echo get_term_link('filmes', 'video_type') ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 16" class="icon_svg mb-1"><defs></defs><path d="M23.458,6.111a1,1,0,0,0-1.039.075L17,10.057V7a3,3,0,0,0-3-3H3A3,3,0,0,0,0,7V17a3,3,0,0,0,3,3H14a3,3,0,0,0,3-3V13.943l5.419,3.87A.988.988,0,0,0,23,18a1.019,1.019,0,0,0,.458-.11A1,1,0,0,0,24,17V7A1,1,0,0,0,23.458,6.111ZM15,17a1,1,0,0,1-1,1H3a1,1,0,0,1-1-1V7A1,1,0,0,1,3,6H14a1,1,0,0,1,1,1Zm7-1.943L17.721,12,22,8.943Z" transform="translate(0 -4)"/></svg>
            Filmes
        </a>
        <a class="navbar__mobile_icon d-flex flex-column justify-content-center align-items-center<?php echo is_tax('video_type', 'documentarios') ? ' active' : '' ?>" href="<?php echo get_term_link('documentarios', 'video_type') ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" class="icon_svg mb-1"><defs></defs><path d="M19.82,1H4.18A3.184,3.184,0,0,0,1,4.18V19.82A3.184,3.184,0,0,0,4.18,23H19.82A3.184,3.184,0,0,0,23,19.82V4.18A3.184,3.184,0,0,0,19.82,1ZM18,8h3v3H18Zm-2,3H8V3h8ZM6,11H3V8H6ZM3,13H6v3H3Zm5,0h8v8H8Zm10,0h3v3H18Zm3-8.82V6H18V3h1.82A1.181,1.181,0,0,1,21,4.18ZM4.18,3H6V6H3V4.18A1.181,1.181,0,0,1,4.18,3ZM3,19.82V18H6v3H4.18A1.181,1.181,0,0,1,3,19.82ZM19.82,21H18V18h3v1.82A1.181,1.181,0,0,1,19.82,21Z" transform="translate(-1 -1)"/></svg>
            Documentários
        </a>
        <a class="navbar__mobile_icon d-flex flex-column justify-content-center align-items-center<?php echo is_tax('video_type', 'series') ? ' active' : '' ?>" href="<?php echo get_term_link('series', 'video_type') ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" class="icon_svg mb-1"><defs></defs><g transform="translate(-1 -1)"><path d="M12,1A11,11,0,1,0,23,12,11.013,11.013,0,0,0,12,1Zm0,20a9,9,0,1,1,9-9A9.01,9.01,0,0,1,12,21Z"/><path d="M16.555,11.168l-6-4A1,1,0,0,0,9,8v8a1,1,0,0,0,1.555.832l6-4a1,1,0,0,0,0-1.664ZM11,14.132V9.869L14.2,12Z"/></g></svg>
            Séries
        </a>
    </nav>