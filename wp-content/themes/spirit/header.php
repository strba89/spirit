<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wedding-theme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <title><?php bloginfo('name'); ?></title>
    <style>
        .highlight-content h1 {
            color: <?= get_theme_mod('nesto'); ?>
        }
    </style>
    <link rel="shortcut icon" href="<?= get_template_directory_uri();?>img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?= get_template_directory_uri();?>img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= get_template_directory_uri();?>img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= get_template_directory_uri();?>img/apple-touch-icon-114x114.png">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> style="background-color: black">
<div id="bodychild">

    <div id="outercontainer">

        <!-- HEADER -->
        <!-- Navigation
==========================================-->
        <nav id="tf-menu" class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">Spirit8</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php
                $args = [
                    'theme_location' => 'header',
                    'menu_class'    => 'nav navbar-nav navbar-right',

                ];
                wp_nav_menu($args);
                ?>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
<!--                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">-->
<!--                    <ul class="nav navbar-nav navbar-right">-->
<!--                        <li><a href="#tf-home" class="page-scroll">Home</a></li>-->
<!--                        <li><a href="#tf-about" class="page-scroll">About</a></li>-->
<!--                        <li><a href="#tf-team" class="page-scroll">Team</a></li>-->
<!--                        <li><a href="#tf-services" class="page-scroll">Services</a></li>-->
<!--                        <li><a href="#tf-works" class="page-scroll">Portfolio</a></li>-->
<!--                        <li><a href="#tf-testimonials" class="page-scroll">Testimonials</a></li>-->
<!--                        <li><a href="#tf-contact" class="page-scroll">Contact</a></li>-->
<!--                    </ul>-->
<!--                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
