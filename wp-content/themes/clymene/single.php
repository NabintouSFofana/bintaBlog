<?php
 global $clymene_option;
get_header(); 
?>
	
	<section class="section white-section section-home-padding-top">
		
		<div class="container">
			<div class="twelve columns">
				<?php while (have_posts()): the_post(); ?> 
				<div class="section-title left">
					<h1><?php the_title(); ?></h1>
					<div class="subtitle left big"><?php _e('Author: ','clymene'); the_author(); ?></div>
				</div>
				<?php endwhile; wp_reset_query(); ?>
			</div>
		</div>
			
	</section>

	<section class="section white-section section-padding-bottom">

		<div class="container">

			<div class="nine columns">
				<div <?php post_class(); ?>>
				<?php while (have_posts()): the_post(); ?> 
				<?php $format = get_post_format($post->ID); ?>	

				<?php if($format=='gallery'){ ?>

				<div class="blog-big-wrapper grey-section">
					<div class="big-post-date"><span>&#xf073;</span> <?php the_time('dS M Y'); ?></div>
					<div id="owl-blog-big-slider" class="owl-carousel owl-theme">
						<?php
 
						include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
						 
						if ( is_plugin_active('meta-box/meta-box.php') ) { ?>
						<?php $images = rwmb_meta( '_cmb_images', "type=image_advanced" ); ?>
				        <?php                                                        
				        foreach ( $images as $image ) {                      
				        ?>
				        <?php $img = $image['full_url']; ?>
						<div class="item">
							<img src="<?php echo esc_url($img); ?>" alt="">
						</div>
						<?php } } ?>	
					</div>
					<?php the_content(); ?>	
				</div>
				<?php }elseif($format=='audio'){?>
				<div class="blog-big-wrapper grey-section">
					<div class="big-post-date"><span>&#xf073;</span> <?php the_time('dS M Y'); ?></div>
					<?php $link_audio = get_post_meta(get_the_ID(),'_cmb_link_audio', true);?>
					<?php if($link_audio !=''){?>
						<iframe height="166" width="100%" scrolling="no" frameborder="no" src="<?php echo esc_url(get_post_meta(get_the_ID(), "_cmb_link_audio", true));?>&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_artwork=true"></iframe>
					<?php }?>
					<?php if(!$link_audio) echo "<div class='bot-50'></div>";?>
					<?php the_content(); ?>	
				</div>
				<?php }elseif($format=='video'){?>
				<div class="blog-big-wrapper grey-section">
					<div class="big-post-date"><span>&#xf073;</span> <?php the_time('dS M Y'); ?></div>
					<?php $link_video = get_post_meta(get_the_ID(),'_cmb_link_video', true);?>
					<?php if($link_video !=''){?>
						<iframe height="180" src="<?php echo esc_url(get_post_meta(get_the_ID(),'_cmb_link_video', true));?>" ></iframe>
					<?php }?>
					<?php if(!$link_video) echo "<div class='bot-50'></div>";?>
					<?php the_content(); ?>	
				</div>
				<?php }elseif($format=='quote'){?>
				<div class="blog-big-wrapper grey-section">
					<div class="big-post-date"><span>&#xf073;</span> <?php the_time('dS M Y'); ?></div>
					<div class="quote-big-post-single"><h5>
					<?php 
					$quote = get_post_meta(get_the_ID(),'_cmb_quote_text', true);
					$autor = get_post_meta(get_the_ID(),'_cmb_quote_autor', true);
					?>
					<?php if($quote !=''){?>
						"<?php echo get_post_meta(get_the_ID(), "_cmb_quote_text", true);?>"
					<?php }?>
					</h5></div>
					<?php if($autor !=''){?>
						<p>- <?php echo get_post_meta(get_the_ID(), "_cmb_quote_autor", true);?></p>
					<?php }?>
					<?php the_content(); ?>	
				</div>
				<?php }elseif($format=='link'){?>
				<div class="blog-big-wrapper grey-section">
					<div class="big-post-date"><span>&#xf073;</span> <?php the_time('dS M Y'); ?></div>
					<?php 
					$text = get_post_meta(get_the_ID(),'_cmb_link_text', true);
					$link = get_post_meta(get_the_ID(),'_cmb_link_out', true);
					?>
					<?php if($text !=''){?>
						<div class="link-big-post-single"><h5><span>&#xf08e;</span><?php echo htmlspecialchars_decode($text);?></h5></div>
					<?php }?>
					<?php the_content(); ?>	
				</div>
				<?php }elseif($format=='image'){?>
				<div class="blog-big-wrapper grey-section">
					<div class="big-post-date"><span>&#xf073;</span> <?php the_time('dS M Y'); ?></div>
					<?php
 
					include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
					 
					if ( is_plugin_active('meta-box/meta-box.php') ) { ?>
					<?php $images = rwmb_meta( '_cmb_image', "type=image" ); ?>
			        <?php                                                        
			        foreach ( $images as $image ) {                      
			        ?>
			        <?php $img = $image['full_url']; ?>
					<div class="item">
						<img src="<?php echo esc_url($img); ?>" alt="">
					</div>
					<?php } } ?>
					<?php the_content(); ?>
				</div>
				<?php }else{ ?>
				<div class="blog-big-wrapper grey-section">
					<div class="big-post-date"><span>&#xf073;</span> <?php the_time('dS M Y'); ?></div>
					
					<div class="bot-50"></div>
					<?php the_content(); ?>
				</div>
				<?php } ?>

				<div class="post-tags-categ grey-section">
					<p><?php _e('Categories: ','clymene'); the_category(', '); ?> | <?php _e('Tags: ','clymene'); the_tags(' '); ?></p>
				</div>	
				<div class="post-content-com-top grey-section" data-scroll-reveal="enter bottom move 200px over 1s after 0.3s">	
					<p><?php _e('Comments ','clymene'); ?> <span>(<?php comments_number( '0', '1', '%' ); ?>)</span></p>
				</div>
				<?php comments_template();?>
			<?php endwhile; ?>
			</div>
			</div>

			<div class="three columns">
				<div class="post-sidebar">
					<?php get_sidebar();?>
				</div>	
			</div>

		</div>	

	</section>

	<section class="section grey-section section-padding-top-bottom">
		<div class="container">
			<div class="twelve columns">
				<div class="section-title">
					<h3><?php echo htmlspecialchars_decode($clymene_option['related_post']); ?></h3>
				</div>
			</div>
			
			<?php $orig_post = $post;
                global $post;
                $categories = get_the_category($post->ID);
                if ($categories) {
                $category_ids = array();
                foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

                $args=array(
                'category__in' => $category_ids,
                'post__not_in' => array($post->ID),
                'posts_per_page'=> 3, // Number of related posts that will be shown.
                'caller_get_posts'=>1
                );

                $my_query = new wp_query( $args );
                if( $my_query->have_posts() ) {               
                while( $my_query->have_posts() ) {
                $my_query->the_post();?>
                 
                  <?php $params = array( 'width' => 600, 'height' => 400 );
                  $image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params ); ?>
                  
                  <div class="four columns">
					<a href="<?php the_permalink(); ?>" class="animsition-link">
						<div class="blog-box-1 white-section">
							<img src="<?php echo esc_url($image); ?>" alt="">
							<div class="blog-date-1"><?php the_time('d.m.y'); ?></div>
							<div class="blog-comm-1"><?php comments_number( '0', '1', '%' ); ?> <span>&#xf086;</span></div>
							<h6><?php the_title(); ?></h6>
							<p><?php echo clymene_blog_excerpt(10); ?></p>
							<div class="link">&#xf178;</div>
						</div>
					</a>
				  </div>

                  <?php 
                  } } }
                  $post = $orig_post;
                  wp_reset_query(); 
                ?>
		</div>
	</section>			

<?php get_footer(); ?>						
