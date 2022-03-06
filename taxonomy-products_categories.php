<?php
get_header();
?>

<main>
  <section class="subnav">
    <div class="row subnav__row">
      <div class="subnav__breadcrumbs">
        <a href="<?= home_url(); ?>" class="subnav__link">Pagrindinis</a>
        <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd"
              d="M4.58579 6L0.292894 1.70711C-0.09763 1.31658 -0.09763 0.683417 0.292894 0.292893C0.683419 -0.0976311 1.31658 -0.097631 1.70711 0.292893L6.70711 5.29289C7.09763 5.68342 7.09763 6.31658 6.70711 6.70711L1.70711 11.7071C1.31658 12.0976 0.683418 12.0976 0.292893 11.7071C-0.0976309 11.3166 -0.0976309 10.6834 0.292894 10.2929L4.58579 6Z"
              fill="#C7CBCF" />
        </svg>
        <a href="<?= home_url(); ?>/products" class="subnav__link">Produktai</a>
        <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd"
              d="M4.58579 6L0.292894 1.70711C-0.09763 1.31658 -0.09763 0.683417 0.292894 0.292893C0.683419 -0.0976311 1.31658 -0.097631 1.70711 0.292893L6.70711 5.29289C7.09763 5.68342 7.09763 6.31658 6.70711 6.70711L1.70711 11.7071C1.31658 12.0976 0.683418 12.0976 0.292893 11.7071C-0.0976309 11.3166 -0.0976309 10.6834 0.292894 10.2929L4.58579 6Z"
              fill="#C7CBCF" />
        </svg>
        <p><?= get_queried_object()->name; ?></p>
      </div>
      <div class="subnav__controls">
        <?php
          $products_cats = get_terms('products_categories');
        ?>
        <select name="products-cats" id="product-cats" class="dropdown">
          <option value="all" class="dropdown__option" selected>Visi produktai</option>
          <?php
            foreach($products_cats as $cat):
            ?>
              <option value="<?= $cat->slug ?>" class="dropdown__option"><?= $cat->name ?></option>
            <?php
            endforeach;
          ?>
        </select>
        <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd"
              d="M4.58579 6L0.292894 1.70711C-0.09763 1.31658 -0.09763 0.683417 0.292894 0.292893C0.683419 -0.0976311 1.31658 -0.097631 1.70711 0.292893L6.70711 5.29289C7.09763 5.68342 7.09763 6.31658 6.70711 6.70711L1.70711 11.7071C1.31658 12.0976 0.683418 12.0976 0.292893 11.7071C-0.0976309 11.3166 -0.0976309 10.6834 0.292894 10.2929L4.58579 6Z"
              fill="#C7CBCF" />
          </svg>
      </div>
    </div>
  </section>

  <section class="products-archive">
    <div class="row products-archive__row">
      <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>
          <div class="product-card">
            <img src="<?= get_the_post_thumbnail_url() ?>" alt="Produkto nuotrauka" class="product-card__img">
            <?php
              $productCats = get_the_terms(get_the_ID(), 'products_categories');
              if($productCats):
            ?>
            <div class="product-card__cats">
              <?php
                foreach($productCats as $cat):
                  $catLink = get_term_link($cat);
                  echo '<a href="'.$catLink.'" class="tag tag--material">'.$cat->name.'</a>';
                endforeach;
              ?>
            </div>
            <?php endif; ?>
            <div class="product-card__details">
              <a href="<?php the_permalink(); ?>"><h2 class="product-card__title"><?php the_title(); ?></h2></a>
              <?php
                $productColors = get_the_terms(get_the_ID(), 'colors');
                if($productColors):
              ?>
              <div class="product-card__colors">
                <div class="product__tags">
                  <?php
                    foreach($productColors as $c):
                      echo '<div class="tag tag--color">'.$c->name.'</div>';
                    endforeach;
                  ?>
                </div>
              </div>
              <?php endif; ?>
              <?php the_excerpt(); ?>
              <div class="product-card__footer">
                <a href="<?php the_permalink(); ?>" class="btn-inline">Daugiau &#187;</a>
              </div>
            </div>
          </div>
        <?php endwhile; ?>

      <?php  endif; ?>
    </div>

    <div class="row pagination__row">
      <div class="pagination">
        <?= paginate_links(array(
          'format' => '?paged=%#%',
          'current' => max( 1, get_query_var('paged') ),
          'prev_text' => __('&laquo; Atgal'),
          'next_text' => __('Pirmyn &raquo;'),
        )); ?>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>