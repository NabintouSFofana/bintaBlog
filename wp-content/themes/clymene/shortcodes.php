<?php 
global $clymene_pre_text;

$clymene_pre_text = 'OT ';


// Custom Heading

add_shortcode('heading', 'clymene_heading_func');

function clymene_heading_func($atts, $content = null){

	extract(shortcode_atts(array(
		'text'		=>	'',
		'tag'		=> 	'',
		'size'		=>	'',
		'color'		=>	'',
		'align'		=>	'',
		'bot'		=>	'',
		'class'		=>	'',
	), $atts));
	
	$size1 = (!empty($size) ? 'font-size: '.$size.'px;' : '');
	$color1 = (!empty($color) ? 'color: '.$color.';' : '');
	$align1 = (!empty($align) ? 'text-align: '.$align.';' : '');
	$bot = (!empty($bot) ? 'margin-bottom: '.$bot.';' : '');
	$cl = (!empty($class) ? ' class= "'.$class.'"' : '');
	
	$html .= '<'.$tag.$cl.' style="' . $size1 . $align1 . $color1 . $bot .'">'. $text .'</'.$tag.'>';
	
	return $html;
}

// Buttons

add_shortcode('button', 'clymene_button_func');
function clymene_button_func($atts, $content = null){

	extract(shortcode_atts(array(
		'btntext' 	=> '',
		'btnlink' 	=> '',
		'type'		=> '',
		'size'		=> '',
		'icon'		=> '',
		'pos'		=> '',
		'margin'	=> '',
	), $atts));

	$mar = (!empty($margin) ? 'margin: '.$margin.';' : '');

	ob_start(); ?>
	<?php 

		if($type == 'ver3'){
			$type1 = 'version-3';
		}elseif($type == 'ver2'){
			$type1 = 'version-2';
		}else{
			$type1 = 'version-1';
		}

		if($size == 'bbig'){
			$size2 = 'text-size-6 text-padding-5 big-button';
		}elseif($size == 'size2'){
			$size2 = 'text-size-2 text-padding-2';
		}elseif($size == 'size3'){
			$size2 = 'text-size-3 text-padding-3';
		}elseif($size == 'size4'){
			$size2 = 'text-size-4 text-padding-4';
		}elseif($size == 'size5'){
			$size2 = 'text-size-5 text-padding-5';
		}elseif($size == 'size6'){
			$size2 = 'text-size-6 text-padding-6';
		}elseif($size == 'size7'){
			$size2 = 'text-size-7 text-padding-7';
		}else{
			$size2 = 'text-size-1 text-padding-1';
		}
	?>
	<?php if($pos){ ?>
	<a style="<?php echo esc_attr($mar); ?>" href="<?php echo esc_url($btnlink); ?>" class="button-shortcodes btn-right <?php echo esc_attr($size2); ?> <?php echo esc_attr($type1); ?>"><?php echo esc_attr($btntext); ?><?php if($icon) { ?><i class="fa fa-<?php echo esc_attr($icon); ?>"></i><?php } ?></a>
	<?php }else{ ?>
	<a style="<?php echo esc_attr($mar); ?>" href="<?php echo esc_url($btnlink); ?>" class="button-shortcodes <?php echo esc_attr($size2); ?> <?php echo esc_attr($type1); ?>"><?php if($icon) { ?><i class="fa fa-<?php echo esc_attr($icon); ?>"></i><?php } echo esc_attr($btntext); ?></a>
	<?php } ?>

	<?php return ob_get_clean();
}

// Home Video
add_shortcode('homevideo', 'clymene_homevideo_func');
function clymene_homevideo_func($atts, $content = null){
	extract(shortcode_atts(array(
		'btext'		=> 	'',
		'stext'		=>	'',
		'mp4'		=>	'',
		'webm'		=>	'',
		'ogg'		=>	'',
	), $atts));

	ob_start(); ?>
	
	<div class="homex">
		<div class="fullscreen-title-home"><?php echo htmlspecialchars_decode($btext); ?></div>
		<div class="fullscreen-subtitle-home"><?php echo htmlspecialchars_decode($stext); ?></div>
		
		<div id="poster_background"></div>
		<video id="video_background" preload="auto" autoplay="true" loop="loop" muted="muted" volume="0"> 
			<source src="<?php echo esc_url($webm); ?>" type="video/webm"> 
			<source src="<?php echo esc_url($mp4); ?>" type="video/mp4"> 
			<source src="<?php echo esc_url($ogg); ?>" type="video/ogg"> 
		</video>
	</div>

	<?php

    return ob_get_clean();
}

// Info Project
add_shortcode('folioinfo', 'clymene_folioinfo_func');
function clymene_folioinfo_func($atts, $content = null){
	extract(shortcode_atts(array(
		'des'		=> 	'',
		'link'		=>	'',
	), $atts));

	ob_start(); ?>
	
	<div class="ajax-project-content">
		<?php if($des) { ?><p><?php echo htmlspecialchars_decode($des); ?></p><?php } ?>
		<?php if($content) { ?><div class="ajax-project-info">
			<?php echo htmlspecialchars_decode($content); ?>
		</div><?php } ?>
		<?php if($link) { ?><a target="_blank" href="<?php echo esc_url($link); ?>"><div class="ajax-link"><?php echo htmlspecialchars_decode($link); ?></div></a><?php } ?>
	</div>

	<?php

    return ob_get_clean();
}

// Slider Project
add_shortcode('folioslider', 'clymene_folioslider_func');
function clymene_folioslider_func($atts, $content = null){
	extract(shortcode_atts(array(
		'gallery'		=> 	'',
		'title'			=>	'',
	), $atts));

	ob_start(); ?>
	
	<div id="owl-portfolio-slider" class="owl-carousel owl-theme">
		<?php 
		$img_ids = explode(",",$gallery);
		foreach( $img_ids AS $img_id ){
		$image_src = wp_get_attachment_image_src($img_id,''); 
		$attachment = get_post( $img_id );?>
			<div class="item">
				<img src="<?php echo esc_url($image_src[0]); ?>" alt="">
				<?php if($title == 'yes') { ?><div class="left-info"><?php echo htmlspecialchars_decode($attachment->post_title); ?></div><?php } ?>
			</div>
		<?php } ?>
	</div>	

	<?php

    return ob_get_clean();
}

// Parallax Top Project
add_shortcode('titlepr', 'clymene_titlepr_func');
function clymene_titlepr_func($atts, $content = null){
	extract(shortcode_atts(array(
		'subtitle'  => 	'',
		'link'		=> 	'',
	), $atts));
	ob_start(); ?>
	
	<?php if($link) { ?><a href="<?php echo esc_attr($link); ?>" class="arrow-down scroll">&#xf103;</a><?php } ?>
	<div class="homex"></div>
	<?php if($content) { ?><div class="fullscreen-title-home"><?php echo htmlspecialchars_decode($content); ?></div><?php } ?>
	<?php if($subtitle) { ?><div class="fullscreen-subtitle-home"><?php echo htmlspecialchars_decode($subtitle); ?></div><?php } ?>

    <?php

    return ob_get_clean();
}

// Parallax Project
add_shortcode('projpl', 'clymene_projpl_func');
function clymene_projpl_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		=>	'',
		'subtitle'  => 	'',
		'image'		=> 	'',
	), $atts));

	$img = wp_get_attachment_image_src($image,'full');
	$img = $img[0];
	ob_start(); ?>
			
	<div class="container">
		<div class="twelve columns">
			<div class="section-title">
				<?php if($title) { ?><h2><?php echo htmlspecialchars_decode($title); ?></h2><?php } ?>
				<?php if($subtitle) { ?><div class="subtitle big"><?php echo htmlspecialchars_decode($subtitle); ?></div><?php } ?>
			</div>
		</div>
		<?php if($image) { ?>
		<div class="twelve columns">
			<div class="more-center big-image" data-image="<?php echo esc_url($img); ?>" data-title="<?php echo htmlspecialchars_decode($title); ?>"></div>
		</div>
		<?php } ?>
	</div>

    <?php

    return ob_get_clean();
}

// Call To Action
add_shortcode('cta', 'clymene_cta_func');
function clymene_cta_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		=> 	'',
		'btn'    	=> 	'',
		'link'    	=> 	'',
		'stitle'    => 	'',
	), $atts));

	ob_start(); ?>
	
	<?php if($stitle) { ?>
	<div class="call-to-action-1">
		<div class="action-top-1"><?php echo htmlspecialchars_decode($stitle); ?></div>
		<h5><?php echo htmlspecialchars_decode($title); ?></h5>
		<a target="_blank" href="<?php echo esc_url($link); ?>" class="button-1"><?php echo htmlspecialchars_decode($btn); ?></a>
	</div>
	<?php }else{ ?>
	<div class="call-to-action-2">
		<h6><?php echo htmlspecialchars_decode($title); ?></h6>
		<a target="_blank" href="<?php echo esc_url($link); ?>" class="button-2"><?php echo htmlspecialchars_decode($btn); ?></a>
	</div>
	<?php } ?>
	
    <?php

    return ob_get_clean();
}

// Our Facts
add_shortcode('ourfacts', 'clymene_ourfacts_func');
function clymene_ourfacts_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		=> 	'',
		'number'    => 	'',
		'style'    	=> 	'',
	), $atts));

	ob_start(); ?>
	
	<?php if($style == 'type2'){ ?>
	<div class="facts-box-2">
		<?php if($title) { ?><h6><?php echo esc_attr($title); ?></h6><?php } ?>
		<?php if($number) { ?><div class="facts-box-2-num"><span class="counter"><?php echo esc_attr($number); ?></span><div class="line"></div></div><?php } ?>
	</div>
	<?php }else{ ?>
	<div class="facts-box-1">
		<?php if($number) { ?><div class="facts-box-1-num"><span class="counter"><?php echo esc_attr($number); ?></span><div class="line"></div></div><?php } ?>
		<?php if($title) { ?><h6><?php echo esc_attr($title); ?></h6><?php } ?>
	</div>
	<?php } ?>

    <?php

    return ob_get_clean();
}

// Skills
add_shortcode('ourskill', 'clymene_ourskill_func');
function clymene_ourskill_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		=> 	'',
		'per'    	=> 	'',
	), $atts));

	ob_start(); ?>
	
	<div class="skills-name"><?php echo htmlspecialchars_decode($title); ?></div>
	<div class="pro-bar-container pro-bar-margin">
		<div class="pro-bar bar-<?php echo esc_attr($per); ?>" data-pro-bar-percent="<?php echo esc_attr($per); ?>" data-pro-bar-delay="300"></div>
		<div class="text-in-bar"><span class="counter-skills"><?php echo esc_attr($per); ?></span>%</div>
		<div class="arrow-skills"></div>
	</div>

    <?php

    return ob_get_clean();
}

// Our Team
add_shortcode('ourteam', 'clymene_ourteam_func');
function clymene_ourteam_func($atts, $content = null){
	extract(shortcode_atts(array(
		'name'		=> 	'',
		'say'    	=> 	'',
		'color'    	=> 	'',
		'job'    	=> 	'',
		'photo'    	=> 	'',
		'icon1'    	=> 	'',
		'link1'    	=> 	'',
		'icon2'    	=> 	'',
		'link2'    	=> 	'',
		'icon3'    	=> 	'',
		'link3'    	=> 	'',
	), $atts));
	$img = wp_get_attachment_image_src($photo,'full');
	$img = $img[0];
	ob_start(); ?>
	
	<div class="team-box-1 <?php if(!$say) echo 'full-image-box'; ?>">
		<img src="<?php echo esc_url($img); ?>"  alt="">
		<?php if($say) { ?>
		<span class="tooltip-content"><?php echo htmlspecialchars_decode($say); ?></span>
		<div class="tooltip-shape">
			<svg viewBox="0 0 200 150" preserveAspectRatio="none">
				<path id="path5" d="M184.112,144.325c0.704,2.461,3.412,4.016,5.905,3.611c2.526-0.318,4.746-2.509,4.841-5.093
				c0.153-2.315-1.483-4.54-3.703-5.155c-2.474-0.781-5.405,0.37-6.612,2.681c-0.657,1.181-0.845,2.619-0.442,3.917"/>
				<path id="path6" d="M159.599,137.909c0.975,3.397,4.717,5.548,8.161,4.988c3.489-0.443,6.558-3.466,6.685-7.043
				c0.217-3.19-1.805-6.34-5.113-7.118c-3.417-1.079-7.469,0.508-9.138,3.701c-0.91,1.636-1.166,3.624-0.612,5.414"/>
				<path id="path7" d="M130.646,125.253c1.368,4.656,6.393,7.288,10.806,6.718c4.763-0.451,9.26-4.276,9.71-9.394
				c0.369-3.779-1.902-7.583-5.244-9.144c-5.404-2.732-12.557-0.222-14.908,5.448c-0.841,1.945-1.018,4.214-0.388,6.294"/>
				<path id="path8" d="M49.933,13.549c10.577-20.192,35.342-7.693,37.057,1.708c3.187-5.687,8.381-10.144,14.943-12.148
				c10.427-3.185,21.37,0.699,28.159,8.982c15.606-3.76,31.369,4.398,35.804,18.915c3.269,10.699-0.488,21.956-8.71,29.388
				c0.395,0.934,0.762,1.882,1.064,2.873c4.73,15.485-3.992,31.889-19.473,36.617c-5.073,1.551-10.251,1.625-15.076,0.518
				c-3.58,10.605-12.407,19.55-24.386,23.211c-15.015,4.586-30.547-0.521-39.226-11.624c-2.861,1.991-6.077,3.564-9.583,4.636
				c-18.43,5.631-32.291,2.419-38.074-19.661c-2.645-10.096,3.606-18.51,3.606-18.51C2.336,71.24,1.132,49.635,16.519,42.394
				C-1.269,28.452,18.559,0.948,37.433,6.818C42.141,8.282,49.933,13.549,49.933,13.549z"/>
			</svg>
		</div>
		<?php } ?>
		<div class="team-box-1-text-in grey-section" style="<?php if($color) echo 'background-color: '.esc_attr($color).';'; ?>">
			<div class="team-name-top"><?php echo htmlspecialchars_decode($job); ?></div>
			<h6><?php echo htmlspecialchars_decode($name); ?></h6>
			<p><?php echo htmlspecialchars_decode($content); ?></p>
			<div class="social-team">
				<ul class="team-social">
					<li class="icon-team">
						<a target="_blank" href="<?php echo esc_url($link1); ?>"><i class="fa fa-<?php echo esc_attr($icon1); ?>"></i></a>
					</li>
					<li class="icon-team">
						<a target="_blank" href="<?php echo esc_url($link2); ?>"><i class="fa fa-<?php echo esc_attr($icon2); ?>"></i></a>
					</li>
					<li class="icon-team">
						<a target="_blank" href="<?php echo esc_url($link3); ?>"><i class="fa fa-<?php echo esc_attr($icon3); ?>"></i></a>
					</li>
				</ul>	
			</div>
		</div>
	</div>

    <?php

    return ob_get_clean();
}

// Team Slider
add_shortcode('teamslide', 'clymene_teamslide_func');
function clymene_teamslide_func($atts, $content = null){
	extract(shortcode_atts(array(
		'show'		=> 	'',
		'color'		=> 	'',
	), $atts));

	ob_start(); ?>
	
	<div class="carousel-team-col<?php echo esc_attr($show); ?> carousel-team-col owl-carousel owl-theme">
		<?php 
			$args = array(    
				'paged' => $paged,
				'post_type' => 'team',
				);
			$wp_query = new WP_Query($args);
			while ($wp_query -> have_posts()): $wp_query -> the_post(); 
			$job = get_post_meta(get_the_ID(),'_cmb_job_team', true);
			$icon1 = get_post_meta(get_the_ID(),'_cmb_soc1', true);
			$link1 = get_post_meta(get_the_ID(),'_cmb_link1', true);
			$icon2 = get_post_meta(get_the_ID(),'_cmb_soc2', true);
			$link2 = get_post_meta(get_the_ID(),'_cmb_link2', true);
			$icon3 = get_post_meta(get_the_ID(),'_cmb_soc3', true);
			$link3 = get_post_meta(get_the_ID(),'_cmb_link3', true);
		?>
		<div class="team-item">
			<div class="team-box-1 full-image-box">
				<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>"  alt="">
				<div class="team-box-1-text-in grey-section" style="<?php if($color) echo 'background-color: '.esc_attr($color).';'; ?>">
					<div class="team-name-top"><?php echo htmlspecialchars_decode($job); ?></div>
					<h6><?php the_title(); ?></h6>
					<?php the_content(); ?>
					<div class="social-team">
						<ul class="team-social">
							<li class="icon-team">
								<a target="_blank" href="<?php echo esc_url($link1); ?>"><i class="fa fa-<?php echo esc_attr($icon1); ?>"></i></a>
							</li>
							<li class="icon-team">
								<a target="_blank" href="<?php echo esc_url($link2); ?>"><i class="fa fa-<?php echo esc_attr($icon2); ?>"></i></a>
							</li>
							<li class="icon-team">
								<a target="_blank" href="<?php echo esc_url($link3); ?>"><i class="fa fa-<?php echo esc_attr($icon3); ?>"></i></a>
							</li>
						</ul>	
					</div>
			
				</div>
			</div>
		</div>
		<?php endwhile; ?>
	</div>

	<script type="text/javascript">
		(function($) { "use strict";
			var owl = $(".carousel-team-col<?php echo esc_attr($show); ?>");
	 
			  owl.owlCarousel({
				 
				  itemsCustom : [
					[0, 1],
					[450, 1],
					[767, 1],
					[768, <?php echo esc_js($show) - 1; ?>],
					[1000, <?php echo esc_js($show); ?>],
					[1200, <?php echo esc_js($show); ?>],
					[1400, <?php echo esc_js($show); ?>],
					[1600, <?php echo esc_js($show); ?>]
				  ],
				navigation : false,
				pagination: true,
				autoPlay: 5000
			 
			});
		})(jQuery); 
	</script>
    <?php

    return ob_get_clean();
}

// Testimonial Slider
add_shortcode('testislide', 'clymene_testislide_func');
function clymene_testislide_func($atts, $content = null){
	extract(shortcode_atts(array(
		'show'		=> 	'',
	), $atts));

	ob_start(); ?>
	
	<div id="owl-blockquotes" class="owl-carousel owl-theme">
		<?php 
			$args = array(    
				'paged' => $paged,
				'post_type' => 'testimonial',
				'posts_per_page' => $show,
				);
			$wp_query = new WP_Query($args);
			while ($wp_query -> have_posts()): $wp_query -> the_post(); 
			$job = get_post_meta(get_the_ID(),'_cmb_job_testi', true);
		?>
		<div class="item blockquotes-1">
			<?php if(has_post_thumbnail()) { ?>
			<div class="arrow-right"></div>
			<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" alt="">
			<?php } ?>
			<h6><?php the_title(); ?></h6>
			<?php the_content(); ?>
			<div class="company-name"><?php echo htmlspecialchars_decode($job); ?></div>
		</div>
		<?php endwhile; ?>
	</div>

	<script type="text/javascript">
		(function($) { "use strict";
			var owl = $(".carousel-team-col<?php echo esc_attr($show); ?>");
	 
			  owl.owlCarousel({
				 
				  itemsCustom : [
					[0, 1],
					[450, 1],
					[767, 1],
					[768, <?php echo esc_js($show) - 1; ?>],
					[1000, <?php echo esc_js($show); ?>],
					[1200, <?php echo esc_js($show); ?>],
					[1400, <?php echo esc_js($show); ?>],
					[1600, <?php echo esc_js($show); ?>]
				  ],
				navigation : false,
				pagination: true,
				autoPlay: 5000
			 
			});
		})(jQuery); 
	</script>
    <?php

    return ob_get_clean();
}

// LightBox
add_shortcode('lightbox', 'clymene_lightbox_func');
function clymene_lightbox_func($atts, $content = null){
	extract(shortcode_atts(array(
		'link'		=> 	'',
		'image'    	=> 	'',
		'grp'    	=> 	'',
	), $atts));

	$gr = (!empty($grp) ? $grp : '');
	$img = wp_get_attachment_image_src($image,'full');
	$img = $img[0];
	ob_start(); ?>
	
	<?php if($link) { ?>
	<a class="vimeo <?php if($grp == true) echo 'group1'; ?>" href="<?php echo esc_url($link); ?>">
		<div class="lightbox-box">
			<img src="<?php echo esc_url($img); ?>" alt="">
		</div>
	</a>
	<?php }else{ ?>
	<a class="<?php if($grp == true) echo 'group2'; else echo 'colorbox-lightbox';?>" href="<?php echo esc_url($img); ?>">
		<div class="lightbox-box">
			<img src="<?php echo esc_url($img); ?>" alt="">
		</div>
	</a>
	<?php } ?>

    <?php

    return ob_get_clean();
}

// Logos Client
add_shortcode('logos', 'clymene_logos_func');
function clymene_logos_func($atts, $content = null){
	extract(shortcode_atts(array(
		'gallery'	=> 	'',
		'num'		=> 	'',
		'ids'		=> 	'',
	), $atts));

	$num1 = (!empty($num) ? $num : 4);

	ob_start(); ?>
	
	<ul id="owl-logos-<?php echo esc_attr($ids); ?>" class="owl-logos owl-carousel owl-theme">
		<?php 
		$img_ids = explode(",",$gallery);
		foreach( $img_ids AS $img_id ){
		$meta = wp_prepare_attachment_for_js($img_id);
	    $caption = $meta['caption'];
	    $image_src = wp_get_attachment_image_src($img_id,''); ?>
			<li>
				<?php if($caption) { ?>
				<a target="_blank" href="<?php echo esc_url( $caption ); ?>"><img src="<?php echo esc_url( $image_src[0] ); ?>" alt=""></a>
				<?php }else{ ?>
				<img src="<?php echo esc_url( $image_src[0] ); ?>" alt="">
				<?php } ?>
			</li>
		<?php } ?>

	</ul>

	<script type="text/javascript">
		(function($) { "use strict";
			var owl = $("#owl-logos-<?php echo esc_js($ids); ?>");
	 
		 	owl.owlCarousel({
			 
			  itemsCustom : [
				[0, 2],
				[450, 2],
				[600, 2],
				[700, <?php echo esc_js($num1)-1; ?>],
				[1000, <?php echo esc_js($num1); ?>],
				[1200, <?php echo esc_js($num1); ?>],
				[1400, <?php echo esc_js($num1); ?>],
				[1600, <?php echo esc_js($num1); ?>]
			  ],
			navigation : false,
			pagination: false,
			autoPlay: 2000
		 
		  	});

		})(jQuery); 
	</script>

	<?php

    return ob_get_clean();
}

// Pricing Table

add_shortcode('pricingtable', 'clymene_pricingtable_func');
function clymene_pricingtable_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		 => '',
		'price'		 => '',
		'money'		 => '',
		'per'		 => '',
		'btn' 		 => '',
		'link'       => '',
		'width'      => '',
		'featured'   => '',
	), $atts));

	$wid = (!empty($width) ? ' width: '.$width.'' : '');

	ob_start(); ?>

	<div class="cd-pricing-wrapper<?php if($featured == 'true') echo " cd-popular";?>" style="<?php echo esc_attr($wid); ?>">
		<header class="cd-pricing-header">
			<h2><?php echo htmlspecialchars_decode($title); ?></h2>

			<div class="cd-price">
				<span class="cd-currency"><?php echo esc_attr($money); ?></span>
				<span class="cd-value"><?php echo esc_attr($price); ?></span>
				<span class="cd-duration"><?php echo esc_attr($per); ?></span>
			</div>
		</header> <!-- .cd-pricing-header -->

		<div class="cd-pricing-body">
			<div class="cd-pricing-features">
				<?php echo htmlspecialchars_decode($content); ?>
			</div>
		</div> <!-- .cd-pricing-body -->

		<footer class="cd-pricing-footer">
			<a class="cd-select" href="<?php echo esc_url($link); ?>"><?php echo esc_attr($btn); ?></a>
		</footer> <!-- .cd-pricing-footer -->
	</div>

	<?php
    return ob_get_clean();
}

// Carousel Images

add_shortcode('carousels1', 'clymene_carousels1_func');
function clymene_carousels1_func($atts, $content = null){
	extract(shortcode_atts(array(
		'gallery'		=> 	'',
		'num'			=> 	'',
		'space'			=> 	'',
	), $atts));

	ob_start(); ?>
	
	<ul id="owl-carouse<?php echo esc_attr($num); ?>" class="owl-carousel-1 owl-carousel owl-theme">
		<?php 
		if($num){ $nu = $num; }else{ $nu = 4; }

		$img_ids = explode(",",$gallery);
		foreach( $img_ids AS $img_id ){
		$image_src = wp_get_attachment_image_src($img_id,''); ?>
			<li style="<?php if($space) echo 'margin: '.esc_attr($space).';'; ?>"><img src="<?php echo esc_url($image_src[0]); ?>" alt=""></li>
		<?php } ?>
	</ul>
	<script type="text/javascript">
	(function($) { "use strict";
		var owl = $("#owl-carouse<?php echo esc_attr($num); ?>");
	 
		  owl.owlCarousel({
			 
			  itemsCustom : [
				[0, 1],
				[450, 1],
				[600, 1],
				[700, <?php echo esc_js($nu)-1; ?>],
				[1000, <?php echo esc_js($nu)-1; ?>],
				[1200, <?php echo esc_js($nu); ?>],
				[1400, <?php echo esc_js($nu); ?>],
				[1600, <?php echo esc_js($nu); ?>]
			  ],
			navigation : false,
			pagination: true,
			autoPlay: 5000
		 
		});
	})(jQuery);
	</script>
	<?php

    return ob_get_clean();
}

// Carousel Porfolito

add_shortcode('carousels2', 'clymene_carousels2_func');
function clymene_carousels2_func($atts, $content = null){
	extract(shortcode_atts(array(
		'space'		=> 	'',
		'show'		=> 	'',
		'num'		=> 	'',
		'bg'		=> 	'',
		'type'		=> 	'',
	), $atts));

	ob_start(); ?>
	
	<ul id="owl-carousel<?php echo esc_attr($num); ?>" class="owl-carousel-1 owl-carousel owl-theme">
		<?php 
		if($show){ $sh = $show; }else{ $sh = 6; }
		if($num){ $nu = $num; }else{ $nu = 4; }

		$args = array(    
			'paged' => $paged,
			'post_type' => 'portfolio',
			'posts_per_page' => $sh
			);
			$wp_query = new WP_Query($args);
			while ($wp_query -> have_posts()): $wp_query -> the_post(); 

			$exc = get_post_meta(get_the_ID(),'_cmb_excerpt_folio', true);
		?> 		

		<?php if($type == 'type2') { ?>
		<li class="not-margin">
			<a href="<?php the_permalink(); ?>">
				<div class="portfolio-box-1" style="<?php if($space) echo 'margin: '.esc_attr($space).';'; ?>">
					<div class="mask-1"></div>
					<?php $params = array( 'width' => 600, 'height' => 423 );
	      			$image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params ); ?>
	      			<img src="<?php echo esc_url($image); ?>" alt="">
					<h6><?php the_title(); ?></h6>
				</div>
			</a>
		</li>
		<?php }else{ ?>		
		<li style="<?php if($space) echo 'margin: '.esc_attr($space).';'; ?>">
			<a href="<?php the_permalink(); ?>" class="animsition-link">
				<div class="portfolio-box-2 grey-section" style="<?php if($bg) echo 'background: '.$bg.';';?>">
					<?php $params = array( 'width' => 600, 'height' => 423 );
	      			$image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params ); ?>
	      			<img src="<?php echo esc_url($image); ?>" alt="">
					<h6><?php the_title(); ?></h6>
					<p><?php echo htmlspecialchars_decode($exc); ?></p>
				</div>
			</a>
		</li>
		<?php } ?>
		<?php endwhile;?> 

	</ul>

	<script type="text/javascript">
	(function($) { "use strict";
		var owl = $("#owl-carousel<?php echo esc_attr($num); ?>");
	 
		  owl.owlCarousel({
			 
			  itemsCustom : [
				[0, 1],
				[450, 1],
				[600, 1],
				[700, <?php echo esc_js($nu)-1; ?>],
				[1000, <?php echo esc_js($nu)-1; ?>],
				[1200, <?php echo esc_js($nu); ?>],
				[1400, <?php echo esc_js($nu); ?>],
				[1600, <?php echo esc_js($nu); ?>]
			  ],
			navigation : false,
			pagination: true,
			autoPlay: 5000
		 
		});
	})(jQuery);
	</script>

	<?php

    return ob_get_clean();
}

// Carousel Blog

add_shortcode('carousels3', 'clymene_carousels3_func');
function clymene_carousels3_func($atts, $content = null){
	extract(shortcode_atts(array(
		'space'		=> 	'',
		'bg'		=> 	'',
		'show'		=> 	'',
		'num'		=> 	'',
	), $atts));

	ob_start(); ?>
	
	<ul id="owl-carous<?php echo esc_attr($num); ?>" class="owl-carousel-1 owl-carousel owl-theme">
		<?php 
		if($show){ $sh = $show; }else{ $sh = 6; }
		if($num){ $nu = $num; }else{ $nu = 4; }

		$args = array(    
			'paged' => $paged,
			'post_type' => 'post',
			'posts_per_page' => $sh
			);
			$wp_query = new WP_Query($args);
			while ($wp_query -> have_posts()): $wp_query -> the_post(); 

			$params = array( 'width' => 600, 'height' => 400 );
            $image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params );
		?> 		

		<li style="<?php if($space) echo 'margin: 0 '.esc_attr($space).';'; ?>">
			<a href="<?php the_permalink(); ?>" class="animsition-link">
				<div class="blog-box-1 white-section" style="<?php if($bg) echo 'background: '.$bg.';';?>">
					<img src="<?php echo esc_url($image); ?>" alt="">
					<div class="blog-date-1"><?php the_time('d.m.y'); ?></div>
					<div class="blog-comm-1"><?php comments_number( '0','1','%' ); ?> <span>&#xf086;</span></div>
					<h6><?php the_title(); ?></h6>
					<p><?php echo clymene_blog_excerpt(10); ?></p>
					<div class="link">&#xf178;</div>
				</div>
			</a>
		</li>

		<?php endwhile;?> 

	</ul>
	<script type="text/javascript">
	(function($) { "use strict";
		var owl = $("#owl-carous<?php echo esc_attr($num); ?>");
	 
		  owl.owlCarousel({
			 
			  itemsCustom : [
				[0, 1],
				[450, 1],
				[600, 1],
				[700, <?php echo esc_js($nu)-1; ?>],
				[1000, <?php echo esc_js($nu)-1; ?>],
				[1200, <?php echo esc_js($nu); ?>],
				[1400, <?php echo esc_js($nu); ?>],
				[1600, <?php echo esc_js($nu); ?>]
			  ],
			navigation : false,
			pagination: true,
			autoPlay: 5000
		 
		});
	})(jQuery);
	</script>

	<?php

    return ob_get_clean();
}

// Socials
add_shortcode('socials', 'clymene_socials_func');
function clymene_socials_func($atts, $content = null){
	extract(shortcode_atts(array(
		'link'		=> 	'',
		'icon'		=> 	'',
		'text'		=> 	'',
	), $atts));

	ob_start(); ?>
	
	<div class="contact-soc">
		<a target="_blank" class="tooltip-shop" href="<?php echo esc_url($link); ?>"><i class="fa fa-<?php echo esc_attr($icon); ?>"></i><span class="tooltip-content-shop"><span class="tooltip-text-shop"><span class="tooltip-inner-shop"><?php echo htmlspecialchars_decode($text); ?></span></span></span></a>
	</div>

	<?php

    return ob_get_clean();
}

// Image Comparison
add_shortcode('comparisons', 'clymene_comparisons_func');
function clymene_comparisons_func($atts, $content = null){
	extract(shortcode_atts(array(
		'img1'		=> 	'',
		'img2'		=> 	'',
		'ver'		=> 	'',
	), $atts));
	$img = wp_get_attachment_image_src($img1,'full');
	$img = $img[0];
	$img2 = wp_get_attachment_image_src($img2,'full');
	$img2 = $img2[0];
	ob_start(); ?>
	
	<div class="twentytwenty-container"<?php if($ver == 'true') echo ' data-orientation="vertical"'; ?>>
		<img src="<?php echo esc_url($img); ?>" alt="">
		<img src="<?php echo esc_url($img2); ?>" alt="">
	</div>

	<?php

    return ob_get_clean();
}

// About Video or Slider
add_shortcode('aboutvos', 'clymene_aboutvos_func');
function clymene_aboutvos_func($atts, $content = null){
	extract(shortcode_atts(array(
		'video'		=> 	'',
		'gallery'	=> 	'',
		'padd'		=> 	'',
		'height'	=> 	'',
	), $atts));

	ob_start(); ?>
	
	<div class="office-1">
		<div class="box-1">
			<?php if($video) { ?>
			<iframe src="<?php echo esc_url($video); ?>" width="940" <?php if($height) { echo 'height= '."$height".''; }else{ echo 'height="290"'; } ?>></iframe>
			<?php }else{ ?>
			<ul class="owl-carousel owl-theme owl-office">
			<?php 
			$img_ids = explode(",",$gallery);
			foreach( $img_ids AS $img_id ){
			$image_src = wp_get_attachment_image_src($img_id,''); 
			$attachment = get_post( $img_id );?>
				<li><img src="<?php echo esc_url($image_src[0]); ?>" alt="" /></li>
			<?php } ?>
			</ul>
			<?php } ?>
		</div>
		<div class="box-1">
			<div class="text-in">
				<div class="section-title left office-text" style="<?php if($padd) echo 'padding-top: '.esc_attr($padd).';'; ?>">
					<?php echo htmlspecialchars_decode($content); ?>
				</div>
			</div>
		</div>
	</div>

	<?php

    return ob_get_clean();
}

// Our Services
add_shortcode('services', 'clymene_services_func');
function clymene_services_func($atts, $content = null){
	extract(shortcode_atts(array(
		'icon'		=> 	'',
		'title'		=> 	'',
		'bg'		=> 	'',
		'type'		=>	'',
	), $atts));

	ob_start(); ?>
	
	<?php if($type == 'type2') { ?>
	<div class="services-boxes-2 white-section" style="<?php if($bg) echo 'background: '.$bg.';'; ?>">
		<div class="icon-box"><i class="fa fa-<?php echo esc_attr($icon); ?>"></i></div>
		<h6><?php echo htmlspecialchars_decode($title); ?></h6>
		<p><?php echo htmlspecialchars_decode($content); ?></p>
	</div>
	<?php }else{ ?>
	<div class="services-boxes-1">
		<div class="icon-box"><i class="fa fa-<?php echo esc_attr($icon); ?>"></i></div>
		<h6><?php echo htmlspecialchars_decode($title); ?></h6>
		<p><?php echo htmlspecialchars_decode($content); ?></p>
	</div>
	<?php } ?>
	<?php

    return ob_get_clean();
}

// Process Steps

add_shortcode('psteps', 'clymene_psteps_func');
function clymene_psteps_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		=> 	'',
		'icon'		=> 	'',
		'btn'		=> 	'',
		'link'		=> 	'',
		'per'		=> 	'',
		'bg'		=> 	'',
		'type'		=> 	'',
	), $atts));

	ob_start(); ?>
	
	<?php if($type == 'type2') { ?>
	<div class="cd-timeline-block">
		<?php if($icon) { ?><div class="cd-timeline-img"><i class="fa fa-<?php echo esc_attr($icon); ?>"></i></div><?php } ?>

		<div class="cd-timeline-content" style="<?php if($bg) echo 'background: '.$bg.';'; ?>">
			<h6><?php echo htmlspecialchars_decode($title); ?></h6>
			<p><?php echo htmlspecialchars_decode($content); ?></p>
			<?php if($btn) { ?><a target="_blank" href="<?php echo esc_url($link); ?>" class="cd-read-more"><?php echo htmlspecialchars_decode($btn); ?></a><?php } ?>
			<?php if($per) { ?><span class="cd-date"><?php echo htmlspecialchars_decode($per); ?></span><?php } ?>
		</div> <!-- cd-timeline-content -->
	</div>
	<?php }else{ ?>
	<div class="services-boxes-2 white-section" style="<?php if($bg) echo 'background: '.$bg.';'; ?>">
		<?php if($icon) { ?><div class="icon-box full-icon-box"><i class="fa fa-<?php echo esc_attr($icon); ?>"></i></div><?php } ?>
		<h6><?php echo htmlspecialchars_decode($title); ?></h6>
		<p><?php echo htmlspecialchars_decode($content); ?></p>
	</div>
	<?php } ?>

	<?php

    return ob_get_clean();
}

// Alert Boxes
add_shortcode('alertbox', 'clymene_alertbox_func');
function clymene_alertbox_func($atts, $content = null){
	extract(shortcode_atts(array(
		'bg'		=> 	'',
		'border'	=> 	'',
		'icon'		=> 	'',
		'padd'		=> 	'',
	), $atts));

	$bg2 = (!empty($bg) ? 'background: '.$bg.';' : '');
	$bor = (!empty($border) ? 'border-color: '.$border.';' : '');
	$pad = (!empty($padd) ? 'padding: '.$padd.';' : '');

	ob_start(); ?>
	
	<div class="alert alert-green" style="<?php echo esc_attr($bg2.$bor.$pad); ?>">
		<p><span><i class="fa fa-<?php echo esc_attr($icon); ?>"></i></span><?php echo htmlspecialchars_decode($content); ?></p>
	</div>

	<?php

    return ob_get_clean();
}

// Portfolio Filter
add_shortcode('workft', 'clymene_workft_func');
function clymene_workft_func($atts, $content = null){
	extract(shortcode_atts(array(
		'show'		=> 	'',
		'all'		=> 	'',
		'bg'		=> 	'',
		'notcn'		=> 	'',
		'mas'		=> 	'',
		'style'		=> 	'',
	), $atts));

	if($style == 'type2'){
		$col = 'four';
	}elseif($style == 'type3'){
		$col = 'six';
	}else{
		$col = 'three';
	}

	ob_start(); ?>
	
	<div id="portfolio-filter">
		<ul id="filter">
			<li><a href="#" class="current" data-filter="*" title=""><?php echo esc_attr($all); ?></a></li>

			<?php 
			$categories = get_terms('categories');   
			foreach( (array)$categories as $categorie){
				$cat_name = $categorie->name;
				$cat_slug = $categorie->slug;
			?>
			<li><a href="#" data-filter=".<?php echo esc_attr($cat_slug); ?>"><?php echo esc_attr($cat_name); ?></a></li>
			<?php } ?>

		</ul>
	</div>
	<div id="projects-grid">
		<?php 
			if($show){ $num = $show; }else{ $num = 9; }
			$args = array(    
				'paged' => $paged,
				'post_type' => 'portfolio',
				'posts_per_page' => $num,
				);
			$wp_query = new WP_Query($args);
			while ($wp_query -> have_posts()): $wp_query -> the_post(); 
			$cates = get_the_terms(get_the_ID(),'categories');
			$cate_name ='';
			$cate_slug = '';
			    foreach((array)$cates as $cate){
					if(count($cates)>0){
						$cate_name .= $cate->name.' ' ;
						$cate_slug .= $cate->slug .' ';     
					} 
			} 

			$exc = get_post_meta(get_the_ID(),'_cmb_excerpt_folio', true);
			$video = get_post_meta(get_the_ID(),'_cmb_folio_video', true);
		?> 		

			<?php if($notcn == 'true') { ?>
			<div class="<?php echo esc_attr($col); ?> portfolio-box-1 columns <?php echo esc_attr($cate_slug); ?>">
			<a href="<?php the_permalink(); ?>">
				<div class="portfolio-box-11">
					<div class="mask-1"></div>
					<?php if($mas != 'true') { $params = array( 'width' => 600, 'height' => 423 );
	      			$image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params ); }else{
	      			$image = wp_get_attachment_url(get_post_thumbnail_id()); }
	      			?>
	      			<img src="<?php echo esc_url($image); ?>" alt="">
					<h6><?php the_title(); ?></h6>
				</div>
			</a>
			</div>
			<?php }else{ ?>
			<div class="<?php echo esc_attr($col); ?> columns <?php echo esc_attr($cate_slug); ?>">
				<div class="portfolio-box-2 grey-section">
					<a href="<?php the_permalink(); ?>" class="animsition-link"><div class="mask-left">&#xf0c1;</div></a>
					<a class="group1 <?php if($video) echo 'vimeo'; ?>" href="<?php if($video) echo esc_url($video); else echo wp_get_attachment_url(get_post_thumbnail_id()); ?>"><div class="mask-right">&#xf0b2;</div></a>
					<?php if($mas != 'true') { $params = array( 'width' => 600, 'height' => 423 );
	      			$image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params ); }else{
	      			$image = wp_get_attachment_url(get_post_thumbnail_id()); }
	      			?>
          			<img src="<?php echo esc_url($image); ?>" alt="">
					<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
					<p><?php echo htmlspecialchars_decode($exc); ?></p>
				</div>
			</div>
			<?php } ?>

		<?php endwhile;?> 

	</div>	

	<?php

    return ob_get_clean();
}

//Google Map

add_shortcode('ggmaps','clymene_maps_func');
function clymene_maps_func($atts, $content = null){
	extract(shortcode_atts(array(
		'height'	 => '',
		'imgmap'	 => '',
		'tooltip'	 => '',
		'latitude'	 => '',
		'longitude'	 => '',
		'zoom'		 => '',
		'btn'		 =>	'',
		'map'		 =>	'',
	), $atts));
	ob_start(); ?>
	<?php 
		$img = wp_get_attachment_image_src($imgmap,'full');
		$img = $img[0];
	 ?>
	<?php if($map != 'true') { ?>
	<a class="button-map close-map"><span><?php echo esc_attr($btn); ?></span></a>
	<?php } ?>
	<div id="google_map" class="ggmap" style="<?php if($height) echo 'height: '.$height.';'; if($map) echo 'display: block;';?>"></div>

	<script>
	
	//Google map	
		
	(function($) { "use strict"

		var e=new google.maps.LatLng(<?php echo esc_attr($latitude); ?>,<?php echo esc_attr($longitude); ?>),
		o={zoom:<?php echo esc_attr($zoom); ?>,center:new google.maps.LatLng(<?php echo esc_attr($latitude); ?>,<?php echo esc_attr($longitude); ?>),
		mapTypeId:google.maps.MapTypeId.ROADMAP,
		mapTypeControl:!1,
		scrollwheel:!1,
		draggable:!0,
		navigationControl:!1
		},
		n=new google.maps.Map(document.getElementById("google_map"),o);
		google.maps.event.addDomListener(window,"resize",function(){var e=n.getCenter();
		google.maps.event.trigger(n,"resize"),n.setCenter(e)});
		
		var g='<div class="map-tooltip"><h6><?php echo htmlspecialchars_decode(esc_attr($tooltip)); ?></h6></div>',a=new google.maps.InfoWindow({content:g})
		,t=new google.maps.MarkerImage("<?php echo esc_url($img); ?>",new google.maps.Size(40,70),
		new google.maps.Point(0,0),new google.maps.Point(20,55)),
		i=new google.maps.LatLng(<?php echo esc_attr($latitude); ?>,<?php echo esc_attr($longitude); ?>),
		p=new google.maps.Marker({position:i,map:n,icon:t,zIndex:3});
		google.maps.event.addListener(p,"click",function(){a.open(n,p)});
		<?php if($showgmap != 'optionmap2'){ ?>			
			$(".button-map").click(function(){$("#google_map").slideToggle(300,function(){google.maps.event.trigger(n,"resize"),n.setCenter(e)}),
			$(this).toggleClass("close-map show-map")});
		<?php } ?>
	
	})(jQuery);

	</script>

	<?php

    return ob_get_clean();

}