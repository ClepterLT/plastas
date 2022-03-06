<?php 
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 */

get_header(); 
?>

<main>
  <section class="product">
    <div class="row product__row">

      <div class="product__left">
        <div class="slider">

        <?php
          $product_images = get_field( 'product_images' );

          foreach($product_images as $image):
        ?>
          <div class="slide"><img src="<?= $image['image']['url'] ?>" alt="<?= $image['image']['alt'] ?>" /></div>

        <?php endforeach; ?>

        <button class="slider__btn slider__btn--left"><img src="<?= get_template_directory_uri(); ?>/assets/images/icon-slider-arrow.svg" alt="Arrow" /></button>
        <button class="slider__btn slider__btn--right"><img src="<?= get_template_directory_uri(); ?>/assets/images/icon-slider-arrow.svg" alt="Arrow" /></button>
        <div class="dots"></div>
      </div>

      </div>

      <div class="product__right">

        <?php if(have_posts()): while (have_posts()): the_post(); ?>
          <h1 class="txt-h1 mb-1"><?= the_title(); ?></h1>
          <?php
            $productCats = get_the_terms(get_the_ID(), 'products_categories');
            if($productCats):
          ?>
          <div class="product__cats">
            <?php
              foreach($productCats as $cat):
                $catLink = get_term_link($cat);
                echo '<a href="'.$catLink.'" class="product__cat">'.$cat->name.'</a>';
              endforeach;
            ?>
          </div>
          <?php endif; ?>

          <?= the_content(); ?>

          <?php
            $productMaterial = get_the_terms(get_the_ID(), 'materials');
            if($productMaterial):
          ?>
          <div class="product__subparagraph">
            <h3 class="txt-h3 mb-1">Medžiagos</h3>
            <div class="product__tags">
              <?php
                foreach($productMaterial as $m):
                  echo '<div class="tag tag--material">'.$m->name.'</div>';
                endforeach;
              ?>
            </div>
          </div>
          <?php endif; ?>

          <?php
            $measures = get_field( 'product_measures' );
            if($measures):
          ?>
          <div class="product__subparagraph">
            <h3 class="txt-h3 mb-1">Techninės detalės</h3>
            <div class="product__tags">
              <?php
                foreach($measures as $m):
                  echo '<div class="tag tag--with-name"><span class="tag__name">'.$m['measure_name'].'</span>'.$m['measure'].'</div>';
                endforeach;
              ?>
            </div>
          </div>
          <?php endif; ?>

          <?php
            $productColors = get_the_terms(get_the_ID(), 'colors');
            if($productColors):
          ?>
          <div class="product__subparagraph">
            <h3 class="txt-h3 mb-1">Spalvos</h3>
            <div class="product__tags pt-xsm">
              <?php
                foreach($productColors as $c):
                  echo '<div class="tag tag--color">'.$c->name.'</div>';
                endforeach;
              ?>
            </div>
          </div>
          <?php endif; ?>

          <?php
            $price = get_field( 'product_price' );
            if($price):
          ?>
          <div class="product__subparagraph">
            <h3 class="txt-h3 mb-1">Kaina</h3>
            <div class="product__price"><?= $price ?></div>
          </div>
          <?php else: ?>
            <div class="product__subparagraph">
              <h3 class="txt-h3 mb-1">Kaina</h3>
              <p>Kaina gali skirtis nuo gaminio specifikacijų, teiraukitės nurodytais kontaktais. Ačiū!</p>
            </div>
          <?php endif; ?>


          <?php
            $manual = get_field( 'product_manual' );
            if($manual):
          ?>
          <div class="product__subparagraph">
            <h3 class="txt-h3 mb-1">Specifikacija</h3>
            <a href="<?= $manual['url'] ?>" class="product__manual" target="_blank"><img src="<?= get_template_directory_uri() ?>/assets/images/icon-pdf.png" alt="PDF icon" /></a>
          </div>
          <?php endif; ?>

        <?php endwhile; ?>
        <?php endif; ?>

      </div>

    </div>
  </section>
</main>

<?php get_footer(); ?>