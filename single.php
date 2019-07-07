<?php get_header(); ?>
<div class="container-fluid bg-white">
	<div class="row">
		<div class="col-sm-12 col-lg-8">
			<div class="row p-4">

				<div class="col-sm-12">
					<?php
					if( has_post_thumbnail() ) :
						the_post_thumbnail('large', array('class' => 'img-fluid w-100 rounded-lg shadow-sm'));
					endif;
					?>
					<?php while( have_posts() ) : the_post(); ?>
					<h4 class="mt-3 text-info text-capitalize">
						<?php the_title(); ?>
					</h4>
					<hr/>

					<div class="text-secondary entry-content">
						<?php the_content(); ?>
					</div>
					<small class="text-secondary"><?php the_author(); ?>, <?php the_date(); ?>
					</small>

					<div class="col-sm-12">
						<?php if(comments_open()) : 
							comments_template(); 
						 endif; ?>
					</div>

					<?php endwhile; ?>
				</div>
			</div>
		</div>
		<div class="col-lg-4 p-4">
			<div class="user-card rounded-lg shadow-sm bg-dark p-4 text-center text-white ">
                        <?php $myWebSite = get_the_author_meta('url');
                              if(!empty($myWebSite)) :
                         ?>
				<a class="text-white text-decoration-none" target="__blank"
					href="<?php echo $myWebSite ?>"><i class="fas fa-laptop"></i> | My Website</a>
			<?php endif; ?>
                                <div class="user-card-body mt-3">
					<img class="img-fluid rounded-circle"
						src="<?php echo get_avatar_url(get_the_author_meta( 'ID' )); ?>">
					<h4 class="text-capitalize mt-3"><?php the_author(); ?></h4>
					<p>
						<?php echo get_the_author_meta( 'description' ); ?>
					</p>
					<ul>
                                                <?php $faceBook = get_the_author_meta('facebook', $post->post_author);
                                                        if(!empty($faceBook)) :
                                                ?>
						<li class="d-inline p-2">
							<a href="<?php echo $faceBook ?>" target="_blank">
							<i class="text-white fa-2x fab fa-facebook-square"></i></a>
						</li>
                                                <?php endif; ?>
                                                
                                                <?php $instagram = get_the_author_meta('instagram', $post->post_author);
                                                        if(!empty($instagram)) :
                                                ?>
						<li class="d-inline p-2">
						<a href="<?php echo $instagram ?>" target="_blank">
							<i class="text-white fa-2x fab fa-instagram" ></i>
						</a>
						</li>
                                                <?php endif; ?>
						
                                                <?php $linkedIn = get_the_author_meta('linkedin', $post->post_author);
                                                        if(!empty($linkedIn)) :
                                                ?>
                                                <li class="d-inline p-2">
						<a href="<?php echo $linkedIn ?>" target="_blank">
							<i class="text-white fa-2x fab fa-linkedin" ></i></a>
						</li>
						<? endif; ?>
                                                
                                                <?php $youTube = get_the_author_meta('youtube', $post->post_author);
                                                        if(!empty($youTube)) :
                                                ?>
                                                <li class="d-inline p-2">
						<a href="<?php echo $youTube ?>" target="_blank">
							<i class="text-white fa-2x fab fa-youtube" ></i></a>
						</li>
                                                <?php endif; ?>
					</ul>
				</div>
			</div>

			<?php if(is_active_sidebar('post-sidebar')): ?>
			<?php dynamic_sidebar('post-sidebar'); ?>
			<?php endif; ?>
		</div>

	</div>
</div>
<?php get_footer(); ?>