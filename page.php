<?php 
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 */

get_header();
?>

<main>
  <section class="default-page">
    <div class="row">
    
      <?php 
      if (have_posts()) : 
        while (have_posts()) : 
          the_post(); 
          the_content(); 
        endwhile; 
      endif; 
      ?>

    </div>
  </section>
</main>

<?php get_footer(); ?>