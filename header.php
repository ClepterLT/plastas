<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta name="description" content="<?php bloginfo('description') ?>">

  <title>
    <?php
      bloginfo('name');
      echo ' | ';
      is_front_page() ? bloginfo('description') : wp_title('');
    ?>
  </title>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header id="header" class="">
    <nav></nav>
  </header>