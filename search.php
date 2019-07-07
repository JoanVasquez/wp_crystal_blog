<?php get_header();?>

<div class="container mt-5 p-4 bg-white rounded">
<?php if(have_posts()) : ?>
        <div class="row">
          <div class="col-12">
            <span class="text-secondary font-weight-bold"
              >Search results for: <?php the_search_query(); ?></span
            >
            <hr />
          </div>
          <?php while(have_posts()) : the_post(); ?>
          <div class="col-sm-12 mt-5">
                <a href="<?php echo get_permalink(); ?>" class="text-decoration-none">
                  <h2 class="font-weight-bold text-info text-capitalize">
                        <?php echo get_the_title();?>
                  </h2>
                </a>
                <p>
                        <?php echo get_the_excerpt(); ?>
                  <a href="<?php echo get_permalink(); ?>" class="text-info text-decoration-none">
                        <?php _e('View More', 'crystalblog');?>
                  </a>
                </p>
                <hr />
              </div>  
          <?php endwhile; ?>

          <?php
            if ( function_exists('bootstrap_pagination') )
                bootstrap_pagination();
        ?>

        </div>

        <?php else: echo '<h3 class="mt-3 bg-light p-4 rounded-lg shadow-sm text-warning text-center">Not posts found</h3>' ?>
        <?php endif;?>
      </div>

<?php get_footer();?>