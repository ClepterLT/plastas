    <footer id="footer" class="footer">

      <div class="row row--wide footer__row">
        <a href="<?php echo get_home_url(); ?>" class="footer__logo-link">
          <?php
            $site_logo_footer = get_field('site_logo', 'options');
            if ($site_logo_footer): $site_logo_footer;
            else: $site_logo_footer = get_template_directory_uri() . '/assets/images/logo.png';
            endif;
          ?>
          <img src="<?= $site_logo_footer ?>" alt="" class="footer__logo-img">
        </a>
        <div class="footer_column">
          <h5 class="txt-h5">Produktai</h5>
          <ul class="footer__list">
            <?php
              $featured_products = get_field('footer_featured_products', 'options');
              foreach($featured_products as $product):
              
            ?>
              <li class="footer__item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-list-arrow.svg" class="footer__arrow" alt="List arrow" />
                <a href="<?= get_permalink($product->ID); ?>" class="plastas-link"><?= $product->post_title ?></a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <div class="footer__column">
          <h5 class="txt-h5">Rekvizitai</h5>
          <?php
            if( have_rows('footer_company_rows', 'options') ) :
          ?>
            <ul class="footer__list">
          <?php
              while( have_rows('footer_company_rows', 'options') ) : the_row();
                $row = get_sub_field('row');
          ?>
            <li class="footer__item"><?= $row ?></li>
          <?php
            endwhile;
          ?>
            </ul>
          <?php
          endif;
          ?>
        </div>
        <div class="footer__column">
          <h5 class="txt-h5">Kontaktai</h5>
          <ul class="footer__list">
            <?php
              $contacts = get_field('contacts', 'options');
              if ($contacts):
                  echo '<li class="footer__item">Telefonas: <a href="tel: '.$contacts['phone'].'" class="plastas-link">'.$contacts['phone'].'</a></li>';
                  echo '<li class="footer__item">El.paštas: <a href="mailto: '.$contacts['email'].'" class="plastas-link">'.$contacts['email'].'</a></li>';
                  echo '<li class="footer__item">Darbo laikas: '.$contacts['working_hours'].'</li>';
              endif;
            ?>
          </ul>
          <div class="footer__socials">
            <?php
            if( have_rows('socials', 'options') ) :
            ?>
              <ul class="nav-header__list" id="nav-list">
            <?php
                while( have_rows('socials', 'options') ) : the_row();
                  $social_icon = get_sub_field('social_icon');
                  $social_link = get_sub_field('social_link');
            ?>
              <a href="<?= $social_link ?>" target="_blank"><img src="<?= $social_icon ?>" alt="Social icon" /></a>
            <?php
              endwhile;
            ?>
              </ul>
            <?php
            endif;
            ?>
          </div>
        </div>
      </div>

      <div class="row row--wide footer__subrow">
        <p class="footer__copyright">&copy <a href="http://www.linkedin.com/in/petras-petkevicius-40168242" target="_blank" class="plastas-link">Petras Petkevicius</a> 2022</p>

        <?php
          if( have_rows('footer_menu_items', 'options') ) :
          ?>
            <nav class="footer__nav">
              <ul class="footer__nav-list">
          <?php
              while( have_rows('footer_menu_items', 'options') ) : the_row();
                $footer_menu_item_title = get_sub_field('footer_menu_item_title');
                $footer_menu_item_link = get_sub_field('footer_menu_item_link');
          ?>
            <li class="footer__nav-item"><a href="<?= $footer_menu_item_link ?>" class="plastas-link footer__nav-link"><?= $footer_menu_item_title ?></a></li>
          <?php
            endwhile;
          ?>
              </ul>
            </nav>
          <?php
          endif;
        ?>

      </div>

    </footer>

    <?php wp_footer(); ?>

  </body>
</html>