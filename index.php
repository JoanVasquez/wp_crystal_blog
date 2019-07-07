<?php get_header(); ?>

<div class="container">
  <div class="row mt-5 pb-5 bg-white text-center shadow-sm">
    <h2 class="text-info mt-5 col-12">Our Tutorials</h2>
    <?php $args = array(
    'post_type' =>
    'crystal_blog_tuto', 'posts_per_page' => 3, 'order'=>'ASC' ); $loop = new
    WP_Query($args); if($loop->have_posts()) : ?>

    <?php while($loop->have_posts()) : $loop->the_post(); ?>
    <div class="col-sm-12 col-lg-4 mt-4">
      <?php the_content(); ?>
    </div>

    <?php endwhile; ?>
    <?php endif; ?>
  </div>

  <div class="row mt-5 bg-transparent p-4 shadow-sm" id="section-users-index">
    <div class="col-sm-12 col-lg-4 my-auto">
      <h4 class="text-info font-weight-bold text-capitalize">
        We have a beautiful and great team working together
      </h4>
      <?php $args = array(
          'post_type' =>
      'crystal_blog_team', 'posts_per_page' => 3, 'order'=>'ASC' ); $loop = new
      WP_Query($args); if($loop->have_posts()) : $loop->the_post(); ?>
      <?php the_content(); ?>
      <?php endif; ?>
    </div>
    <div class="col-sm-12 col-lg-8">
      <div class="row text-center ">
        <?php $blogusers = get_users( array(
          'number' =>
        3, 'order' => 'ASC' ) ); foreach ( $blogusers as $user ) { ?>
        <?php $user_data = get_user_meta($user->ID) ?>
        <div class="col-sm-12 col-lg-4 mt-3 mx-auto">
          <img
            src="<?php echo get_avatar_url($user->ID); ?>"
            alt=""
            class="img-fluid rounded-circle"
          />
          <h5 class="text-white text-capitalize mt-2">
            <?php echo $user->display_name ?>
          </h5>
          <p class="text-white">
            <?php echo get_the_author_meta( 'description', $user->ID ); ?>
          </p>
        </div>
        <?php } ?>
        <!--<div class="col-sm-12 col-lg-4 mt-3">
          <img
            src="https://randomuser.me/api/portraits/women/70.jpg"
            alt=""
            class="img-fluid rounded-circle"
          />
          <h5 class="text-white text-capitalize mt-2">
            Leslie Fields
          </h5>
          <p class="text-white">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto
            aperiam illum ratione velit nemo recusandae magni possimus, cumque
            fugit est magnam temporibus.
          </p>
        </div>
        <div class="col-sm-12 col-lg-4 mt-3">
          <img
            src="https://randomuser.me/api/portraits/men/9.jpg"
            alt=""
            class="img-fluid rounded-circle"
          />
          <h5 class="text-white text-capitalize mt-2">
            Mike Hawkins
          </h5>
          <p class="text-white">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto
            aperiam illum ratione velit nemo recusandae magni possimus, cumque
            fugit est magnam temporibus.
          </p>
        </div>
        <div class="col-sm-12 col-lg-4 mt-3">
          <img
            src="https://randomuser.me/api/portraits/women/19.jpg"
            alt=""
            class="img-fluid rounded-circle"
          />
          <h5 class="text-white text-capitalize mt-2">
            Renee Graham
          </h5>
          <p class="text-white">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto
            aperiam illum ratione velit nemo recusandae magni possimus, cumque
            fugit est magnam temporibus.
          </p>
        </div>-->
      </div>
    </div>
  </div>
</div>

<div class="container-fluid mt-5">
  <div class="row text-center bg-white pb-5 shadow-sm">
    <h2 class="text-info mt-5 col-12">
      Learn Most Popular Programming Languages
    </h2>
    <div class="col-sm-4 col-lg-2 mt-3">
      <img
        src="<?php bloginfo('template_url'); ?>/resources/img/icons8-java.svg"
        alt=""
        width="120"
        class="img-fluid"
      />
    </div>
    <div class="col-sm-4 col-lg-2 mt-3">
      <img
        src="<?php bloginfo('template_url'); ?>/resources/img/icons8-javascript.svg"
        alt=""
        width="120"
        class="img-fluid"
      />
    </div>
    <div class="col-sm-4 col-lg-2 mt-3">
      <img
        src="<?php bloginfo('template_url'); ?>/resources/img/icons8-python.svg"
        alt=""
        width="120"
        class="img-fluid"
      />
    </div>
    <div class="col-sm-4 col-lg-2 mt-3">
      <img
        src="<?php bloginfo('template_url'); ?>/resources/img/icons8-c-sharp-logo-2.svg"
        alt=""
        width="120"
        class="img-fluid"
      />
    </div>
    <div class="col-sm-4 col-lg-2 mt-3">
      <img
        src="<?php bloginfo('template_url'); ?>/resources/img/icons8-ruby-programming-language.svg"
        alt=""
        width="120"
        class="img-fluid"
      />
    </div>
    <div class="col-sm-4 col-lg-2 mt-3">
      <img
        src="<?php bloginfo('template_url'); ?>/resources/img/icons8-php-logo.svg"
        alt=""
        width="120"
        class="img-fluid"
      />
    </div>
  </div>

  <div class="row mt-5 p-4 text-center shadow-sm" id="section-technology">
    <h2 class="text-white text-capitalize col-12 mt-5 mb-5">
      Get Ready With The New Technologies!
    </h2>
    <div class="col-sm-12 col-lg-6">
      <img
        src="<?php bloginfo('template_url'); ?>/resources/img/laptop.png"
        alt=""
        class="img-fluid"
      />
    </div>
    <div class="col-sm-12 col-lg-6">
      <img
        src="<?php bloginfo('template_url'); ?>/resources/img/devices.png"
        alt=""
        class="img-fluid"
      />
    </div>
  </div>
</div>

<?php get_footer(); ?>
