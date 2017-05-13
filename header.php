<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php  echo esc_url( get_template_directory_uri() );?>/images/favicon.png">

    <?php wp_head(); ?>

  </head>

  <body <?php body_class(); ?>>

    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php  echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a>
        </div>

        <div class="navbar-collapse collapse">

          <?php
            $args = array(
              'theme_location'   => 'headermenu',
              'menu_class'  => 'nav navbar-nav navbar-right',
              'container'   => 'false'
            );
            wp_nav_menu( $args );
          ?>

        </div><!--/.navbar-collapse -->

      </div>
    </div>
