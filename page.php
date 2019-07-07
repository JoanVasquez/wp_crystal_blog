<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <?php while( have_posts() ) : the_post(); ?>
            <div class="mt-5" <?php post_class(); ?>>
                <h2 class="text-secondary text-capitalize"><?php the_title(); ?></h2>
                <hr>
                <div class="text-secondary">
                    <?php the_content(); ?>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>