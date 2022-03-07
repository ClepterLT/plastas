<?php
/*
Template Name: Simple Page
*/

get_header(); ?>

<main>
    <section class="default-page">
        <div class="row">

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
                
            <?php endwhile; endif; ?>

        </div>
    </section>
</main>

<?php get_footer(); ?>