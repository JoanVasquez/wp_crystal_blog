<?php get_header();?>

<div class="container-fluid bg-white">
    <div class="row">
        <div class="col-sm-12 col-lg-8">
            <?php
                if (is_category()) {
            ?>
            <h2 class="font-weight-bold text-secondary text-capitalize col-12 mt-4">
                <?php _e('Category', 'crystalblog')?> |
                <?php single_cat_title();?>
            </h2>

            <?php }?>

            <?php
            if (is_tag()) {
            ?>
            <h2 class="font-weight-bold text-secondary text-capitalize col-12 mt-4">
                <?php _e('Tag', 'crystalblog')?> |
                <?php single_tag_title();?>
            </h2>
            <?php }?>

            <?php
            if (is_author()) {
            $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
            ?>
            <h2 class="font-weight-bold text-secondary text-capitalize col-12 mt-4">
                <?php _e('Author', 'crystalblog')?> |
                <?php $curauth->user_nicename;?>
            </h2>
            <?php }?>

            <?php
            if (is_date()) {
            ?>
            <h2 class="font-weight-bold text-secondary text-capitalize col-12 mt-4">
                <?php _e('Entry date', 'crystalblog')?>
                <?php
            $year = get_query_var('year');
                $month = get_query_var('monthnum');
                $day = get_query_var('day');
                if ($year > 0) {
                    echo $year;
            }

            if ($monthnum > 0) {
                echo '-' . str_pad($month, 2, 0, STR_PAD_LEFT);
            }

            if ($day > 0) {
                echo '-' . str_pad($day, 2, 0, STR_PAD_LEFT);
            }

            ?>
            </h2>

            <?php }?>

            <?php
            if(have_posts()) :
            while (have_posts()): the_post();
            ?>
            <div class="row p-4" <?php post_class('row');?>>
                <?php
            if (has_post_thumbnail()):
                the_post_thumbnail('large', array('class' => 'img-fluid w-100 h-100'));
            endif;
            ?>
                <div class="col-sm-12 card shadow-sm">
                    <div class="card-body">
                        <h4 class="text-capitalize">
                            <a class="text-info text-decoration-none" href="<?php echo get_permalink(); ?>">
                                <?php echo get_the_title();?>
                            </a>
                        </h4>
                        <p class="card-text text-secondary">
                            <?php echo get_the_excerpt(); ?>
                            <a href="<?php echo get_permalink(); ?>">
                                <?php _e('View More', 'crystalblog');?>
                            </a>
                        </p>
                    </div>
                    <div class="card-footer bg-transparent">
                        <small class="text-secondary"><?php the_author(); ?>, <?php the_date(); ?>
                        </small>
                        <br />
                        <span class="text-dark">
                            <i class="far fa-comment-alt"></i> <?php echo get_comments_number();?>
                        </span>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            <?php
            if ( function_exists('bootstrap_pagination') )
                bootstrap_pagination();
            ?>

            <?php else: echo '<h3 class="mt-3 bg-light p-4 rounded-lg shadow-sm text-warning text-center">Not posts found</h3>' ?>
            <?php endif;?>
        </div>

        <div class="col-lg-4 p-4 mt-2">
            <?php if (is_active_sidebar('post-sidebar')): ?>
                <?php dynamic_sidebar('post-sidebar');?>
            <?php endif;?>
        </div>
    </div>
</div>

<?php get_footer();?>