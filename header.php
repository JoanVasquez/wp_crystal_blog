<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Open+Sans" rel="stylesheet" />
    <link rel="icon" type="image/ico" href="<?php bloginfo('template_url'); ?>/resources/img/ico.png"/>
    
    
    
    <link rel="shortcut icon" type="image/png" href="/resources/img/ico.png"/>

    <title>Blog Tutorial</title>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="main-header shadow-sm">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky" id="main-navbar">
            <div class="container">
                <a class="navbar-brand" href="http://blog.cristalcode.com"><i class="fas fa-terminal"></i></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-top"
                    aria-controls="navbar-top" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbar-top">
                    <?php
                      wp_nav_menu( array(
                        'theme_location'  => 'top',
                        'depth'	          => 2,
                        'container'       => 'ul',
                        'menu_class'      => 'navbar-nav ml-auto',
                        'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'          => new WP_Bootstrap_Navwalker(),
                      ) );
                    ?>

                    <?php get_search_form(); ?>
                    
                </div>
            </div>
        </nav>

        <div class="header-img">
            <div class="w-100 h-100 d-flex flex-row justify-content-center align-items-center">
                <div class="container">
                    <h1 class="text-white text-center">Software Development</h1>
                    <h2 class="text-warning text-capitalize text-center mt-3" id="sub-header-title">
                        <small>The best software tutorials ever</small>
                    </h2>
                </div>
            </div>
        </div>
    </header>

    <div id="main-wrapper">