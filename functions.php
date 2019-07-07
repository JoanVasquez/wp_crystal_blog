<?php

require_once('class-wp-bootstrap-navwalker.php');
require_once('comments-helper.php');
require_once('wp_bootstrap_pagination.php');

//ADDING SCRIPTS AND STYLE
function themeScripts() {
	wp_enqueue_style( 'bootstrap.css', get_template_directory_uri() . '/vendors/css/bootstrap.min.css');
	wp_enqueue_style('style', get_stylesheet_directory_uri().'/style.css',false, null);
   
   if ( ! is_admin() ) {
	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'jquery', get_template_directory_uri() .
   '/vendors/js/jquery.js', array(), '3.4.0', true );	
  }

  wp_enqueue_script( 'jquery.validate', get_template_directory_uri() .
   '/vendors/js/jquery.validate.min.js', array(), '1.17.0', true );	

   wp_enqueue_script( 'jquery.validate.additional-methods', get_template_directory_uri() .
   '/vendors/js/additional-methods.min.js', array(), '1.17.0', true );	

  wp_enqueue_script( 'popper', get_template_directory_uri() .
   '/vendors/js/popper.js', array(), '1.14.7', true );	

  wp_enqueue_script( 'bootstrap.js', get_template_directory_uri() .
   '/vendors/js/bootstrap.min.js', array(), '4.3.1', true );	

  wp_enqueue_script( 'app', get_template_directory_uri() .
   '/resources/js/app.js', array(), '1.0', true );
}

add_action( 'wp_enqueue_scripts', 'themeScripts' );

//Enable support for post Thumbnail and pages
add_theme_support('post-thumbnails');

add_image_size('crystalblog-featured-image', 2000, 1200, true);

add_image_size('crystalblog-featured-avatar', 100, 100, true);

function my_img_caption_shortcode_width($width, $atts, $content)
{
    return 0;
}

function add_image_responsive_class($content) {
   global $post;
   $pattern ="/<img(.*?)class=\"(.*?)\"(.*?)>/i";
   $replacement = '<img$1class="$2 img-fluid"$3>';
   $content = preg_replace($pattern, $replacement, $content);
   return $content;
}
add_filter('the_content', 'add_image_responsive_class');

add_filter('img_caption_shortcode_width', 'my_img_caption_shortcode_width', 10, 3);


//CREATE NAVBARS
register_nav_menus( array(
    'top' => __('Top Menu', 'crystalblog'),
    'footer' => __('Footer Menu', 'crystalblog')
) );

//ADD ACTIVE CLASS TO THE NAVBAR ON CURRENT PAGE
function specialNavClass ($classes, $item) {
    if (in_array('current-page-ancestor', $classes) || in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}

add_filter('nav_menu_css_class' , 'specialNavClass' , 10 , 2);

//ADD SIDEBAR
function crystalBlogWidgets() {
	register_sidebar( array(
		'name' 			=> __('Post Sidebar', 'crystalcode'),
		'id' 			=> 'post-sidebar',
		'class' 		=> 'text-secondary',
		'description' 	=> __('Widgets in this area will be shown on all posts', 'crystalblog'),
		'before_widget' => '<div class="widget">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h3 class="text-capitalize text-info mt-4">',
		'after_title' 	=> '</h3>'
	) );
}

add_action('widgets_init', 'crystalBlogWidgets');

//ADDING CUSTOME COMMENT FORM
function commentFormFields($fields) {
	$fields['email'] = '';
	$fields['url'] = '';
	$fields['author'] = '
	<div class="row form-group">
    	<label class="col-sm-12 col-lg-3 col-form-label text-info" for="author">Your Name</label>
		<div class="col-sm-12 col-lg-6">
			<input type="text" 
					id="author" 
					name="author" 
					class="form-control" 
					placeholder="Your Name"
					required />
		</div>
	</div>';
	$fields['comment_field'] = '
    <div class="row form-group">
        <label class="col-sm-12 col-lg-3 col-form-label text-info" for="comment">Your Comment</label>
		    <div class="col-sm-12 col-lg-6">
          <textarea id="comment_field" 
          name="comment_field" 
          class="form-control" 
          rows="3" 
          placeholder="Write a comment" 
          required></textarea>
		    </div>
	</div>';
	unset( $fields['cookies'] );

	return $fields;
}

add_filter('comment_form_default_fields', 'commentFormFields', 15);


function crystalBlogMenu() {
	register_post_type('crystal_blog_tuto', array(
		'labels' => array(
            'name' => __('Tutorials Info')
        ),
        'public' => true,
        'exclude_from_search' => true,
        'has_archive' => false,
        'show_in_nav_menus' => false,
        'menu_icon' => 'dashicons-format-status',
        'supports' => array('title', 'editor')
	));

	register_post_type('crystal_blog_team', array(
		'labels' => array(
            'name' => __('Our Team Info')
        ),
        'public' => true,
        'exclude_from_search' => true,
        'has_archive' => false,
        'show_in_nav_menus' => false,
        'menu_icon' => 'dashicons-admin-users',
        'supports' => array('title', 'editor')
	));
}

add_action('init', 'crystalBlogMenu');

function crystalBlogText($atts, $content = null) {
    return "<" . $atts['type'] . " class='" . $atts['class'] . "'>" . $content . "</" . $atts['type'] . ">";
}

add_shortcode('crystalBlogText', 'crystalBlogText');