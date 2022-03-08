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

  <header id="header" class="header">

    <div class="row--header">

      <div class="logo">
        <a href="<?php echo get_home_url(); ?>" class="logo__link">
          <?php
            $site_logo = get_field('site_logo', 'options');
            if ($site_logo): $site_logo;
            else: $site_logo = get_template_directory_uri() . '/assets/images/logo.png';
            endif;
          ?>
          <img src="<?= $site_logo ?>" alt="Logo image" class="logo__img">
        </a>
      </div>
    
      <nav class="nav-header">
        <?php
          if( have_rows('header_nav_menu_items', 'options') ) :
        ?>
          <ul class="nav-header__list" id="nav-list">
        <?php
            while( have_rows('header_nav_menu_items', 'options') ) : the_row();
              $menu_item_title = get_sub_field('menu_item_title');
              $menu_item_link = get_sub_field('menu_item_link');
        ?>
          <li class="nav-header__item"><a href="<?= $menu_item_link ?>" class="nav-header__link"><?= $menu_item_title ?></a></li>
        <?php
          endwhile;
        ?>
          </ul>
        <?php
        endif;
        ?>
        <?php
          $header_nav_button_label = get_field('header_nav_button_label', 'options');
          $header_nav_button_link = get_field('header_nav_button_link', 'options');
          if ($header_nav_button_label AND $header_nav_button_link):
              echo '<a href="'.$header_nav_button_link.'" class="button">'.$header_nav_button_label.'</a>';
          endif;
        ?>
      </nav>

      <button type="button" class="nav-header__button">
        <svg class="nav-header__icon js-icon-open">
          <path d="M0 3h20v2h-20v-2zM0 9h20v2h-20v-2zM0 15h20v2h-20v-2z"></path>
        </svg>
        <svg class="nav-header__icon js-icon-close js-icon-hidden">
          <path d="M10 8.586l-7.071-7.071-1.414 1.414 7.071 7.071-7.071 7.071 1.414 1.414 7.071-7.071 7.071 7.071 1.414-1.414-7.071-7.071 7.071-7.071-1.414-1.414-7.071 7.071z"></path>
        </svg>
      </button>
        
      <nav class="nav-header--mobile">
        <?php
          if( have_rows('header_nav_menu_items', 'options') ) :
        ?>
        <ul class="nav-header--mobile__list" id="nav-list">
          <?php
            while( have_rows('header_nav_menu_items', 'options') ) : the_row();
              $menu_item_title = get_sub_field('menu_item_title');
              $menu_item_link = get_sub_field('menu_item_link');
          ?>
          <li class="nav-header--mobile__item"><a href="<?= $menu_item_link ?>" class="nav-header--mobile__link"><?= $menu_item_title ?></a></li>
          <?php
          endwhile;
          ?>
        </ul>
        <?php
        endif;
        ?>
        <?php
        if ($header_nav_button_label AND $header_nav_button_link):
          echo '<a href="'.$header_nav_button_link.'" class="button">'.$header_nav_button_label.'</a>';
        endif;
        ?>
      </nav>

    </div>

  </header>