<?php
global $pmc_data; 
$use_bg = ''; $background = ''; $custom_bg = ''; $body_face = ''; $use_bg_full = ''; $bg_img = ''; $bg_prop = '';



if(isset($pmc_data['background_image_full'])) {
	$use_bg_full = $pmc_data['background_image_full'];
	
}

if(isset($pmc_data['use_boxed'])){
	$use_boxed = $pmc_data['use_boxed'];
}
else{
	$use_boxed = 0;
}

if($use_bg_full) {


	if($use_bg_full && isset($pmc_data['use_boxed']) && $pmc_data['use_boxed'] == 1) {
		$bg_img = $pmc_data['image_background'];
		$bg_prop = '';
	}

	

	
	$background = 'url('. $bg_img .') '.$bg_prop ;

}

function ieOpacity($opacityIn){
	
	$opacity = explode('.',$opacityIn);
	if($opacity[0] == 1)
		$opacity = 100;
	else
		$opacity = $opacity[1] * 10;
		
	return $opacity;
}

function HexToRGB($hex,$opacity) {
		$hex = preg_replace("/#/", "", $hex);
		$color = array();
 
		if(strlen($hex) == 3) {
			$color['r'] = hexdec(substr($hex, 0, 1) . $r);
			$color['g'] = hexdec(substr($hex, 1, 1) . $g);
			$color['b'] = hexdec(substr($hex, 2, 1) . $b);
		}
		else if(strlen($hex) == 6) {
			$color['r'] = hexdec(substr($hex, 0, 2));
			$color['g'] = hexdec(substr($hex, 2, 2));
			$color['b'] = hexdec(substr($hex, 4, 2));
		}
 
		return 'rgba('.$color['r'] .','.$color['g'].','.$color['b'].','.$opacity.')';
	}
	
	if(isset($pmc_data['google_menu_custom']) && $pmc_data['google_menu_custom'] != ''){
		$font_menu = explode(':',$pmc_data['google_menu_custom']);
		if(count($font_menu)>1) {
			$font_menu = $font_menu[0];
		}
		else{
			$font_menu = $pmc_data['google_menu_custom'];
		}
	}else{
		$font_menu = explode(':',$font_menu);
		if(count($font_menu)>1) {
			$font_menu = $font_menu[0];
		}
		else{
			$font_menu = $font_menu;
		}
	}		
	
	if(!empty($pmc_data['google_quote_custom'])){
		$font_quote = explode(':',$pmc_data['google_quote_custom']);
		if(count($font_quote)>1) {
			$font_quote = $font_quote[0];
		}
		else{
			$font_quote = $pmc_data['google_quote_custom'];
		}
	}else{
		$font_quote = explode(':',$font_quote);
		if(count($font_quote)>1) {
			$font_quote = $font_quote[0];
		}
		else{
			$font_quote = $font_quote;
		}
	}	

	if(isset($pmc_data['google_heading_custom']) && $pmc_data['google_heading_custom'] != ''){
		$font_heading = explode(':',$pmc_data['google_heading_custom']);
		if(count($font_heading)>1) {
			$font_heading = $font_heading[0];
		}
		else{
			$font_heading= $pmc_data['google_heading_custom'];
		}	
	}else{
		$font_heading = explode(':',$font_heading);
		if(count($font_heading)>1) {
			$font_heading = $font_heading[0];
		}
		else{
			$font_heading=$font_heading;
		}	
	}

	if(isset($pmc_data['google_body_custom']) && $pmc_data['google_body_custom'] != ''){
		$font_body = explode(':',$pmc_data['google_body_custom']);
		if(count($font_body)>1) {
			$font_body = $font_body[0];
		}
		else{
			$font_body = $pmc_data['google_body_custom'];
		}
	}else{
		$font_body = explode(':',$font_body);
		if(count($font_body)>1) {
			$font_body = $font_body[0];
		}
		else{
			$font_body = $font_body;
		}		
	}	

?>


.block2_text p, .block_footer_text,.quote-category .blogpostcategory p,.quote-category .blogpostcategory,.blogpostcategory .post-author a,.blogpostcategory .post-time a
  {font-family: <?php echo esc_attr($font_quote); ?>, "Helvetica Neue", Arial, Helvetica, Verdana, sans-serif;}
body {	 
	background:<?php echo esc_attr($pmc_data['body_background_color']).' '.$background ?>  !important;
	color:<?php echo esc_attr($pmc_data['body_font']['color']); ?>;
	font-family: <?php echo esc_attr($font_body); ?>, "Helvetica Neue", Arial, Helvetica, Verdana, sans-serif;
	font-size: <?php echo esc_attr($pmc_data['body_font']['size']); ?>;
	font-weight: normal;
	
}
::selection { background: #000; color:#fff; text-shadow: none; }

h1, h2, h3, h4, h5, h6 {font-family: <?php echo esc_attr($font_heading); ?>, "Helvetica Neue", Arial, Helvetica, Verdana, sans-serif;}
h1 { 	
	color:<?php echo esc_attr($pmc_data['heading_font_h1']['color']); ?>;
	font-size: <?php echo esc_attr($pmc_data['heading_font_h1']['size'])	?> !important;
	}
	
h2, .term-description p { 	
	color:<?php echo esc_attr($pmc_data['heading_font_h2']['color']); ?>;
	font-size: <?php echo esc_attr($pmc_data['heading_font_h2']['size']) ?> !important;
	}

h3 { 	
	color:<?php echo esc_attr($pmc_data['heading_font_h3']['color']); ?>;
	font-size: <?php echo esc_attr($pmc_data['heading_font_h3']['size']) ?> !important;
	}

h4 { 	
	color:<?php echo esc_attr($pmc_data['heading_font_h4']['color']); ?>;
	font-size: <?php echo esc_attr($pmc_data['heading_font_h4']['size']) ?> !important;
	}	
	
h5 { 	
	color:<?php echo esc_attr($pmc_data['heading_font_h5']['color']); ?>;
	font-size: <?php echo esc_attr($pmc_data['heading_font_h5']['size']) ?> !important;
	}	

h6 { 	
	color:<?php echo esc_attr($pmc_data['heading_font_h6']['color']); ?>;
	font-size: <?php echo esc_attr($pmc_data['heading_font_h6']['size']) ?> !important;
	}	

.pagenav a {font-family: <?php echo esc_attr($font_menu); ?> !important;
			  font-size: <?php echo esc_attr($pmc_data['menu_font']['size']) ?>;
			  font-weight:<?php echo esc_attr($pmc_data['menu_font']['style']) ?>;
			  color:<?php echo esc_attr($pmc_data['menu_font']['color']) ?>;
}


a, select, input, textarea, button{ color:<?php echo esc_attr($pmc_data['body_link_coler']); ?>;}
h3#reply-title, select, input, textarea, button,.wttitle h4 a, .related h4 {font-family: <?php echo esc_attr($font_body); ?>, "Helvetica Neue", Arial, Helvetica, Verdana, sans-serif;}

.prev-post-title, .next-post-title, .blogmore, .more-link, .pmc-grid .pmc-read-more a {font-family: <?php echo esc_attr($font_heading); ?>, "Helvetica Neue", Arial, Helvetica, Verdana, sans-serif;}

/* ***********************
--------------------------------------
------------MAIN COLOR----------
--------------------------------------
*********************** */

a:hover, span, .current-menu-item a, .blogmore, .more-link:hover, .wp-pagenavi a, .wp-pagenavi span,.block2_text a,.blogpostcategory .blog-date a:hover,.tparrows.preview1:hover:after

{
	color:<?php echo esc_attr($pmc_data['mainColor']); ?>;
}


 
/* ***********************
--------------------------------------
------------BACKGROUND MAIN COLOR----------
--------------------------------------
*********************** */

.top-cart, .pagenav .social_icons a, .blog_social .addthis_toolbox a:hover, #footer .social_icons a, .sidebar .social_icons a, .widget_tag_cloud a:hover, .sidebar .widget_search #searchsubmit,
.menu ul.sub-menu li:hover, .wp-pagenavi .current, .wp-pagenavi a:hover, .specificComment .comment-reply-link:hover, #submit:hover, .addthis_toolbox a:hover, .wpcf7-submit:hover, #submit:hover,
.link-title-previous:hover, .link-title-next:hover, .specificComment .comment-edit-link:hover, .specificComment .comment-reply-link:hover, h3#reply-title small a:hover, .pagenav li a:after,.social_icons a:hover,
.quote-category .blogpostcategory:hover,.blogpostcategory .blog-category a,.blogpostcategory .post-time a,.blogpostcategory .post-author a,
.singledefult .blog-category a,.singledefult .post-time a,.singledefult .post-author a,.block1_lower_text p, .sidebar-buy-button a,.widget_wysija_cont .wysija-submit, #upperheader
  {
	background:<?php echo esc_attr($pmc_data['mainColor']); ?> ;
}
.pmc-navigation .alignright a:hover, .pmc-navigation .alignleft a:hover{background:<?php echo esc_attr($pmc_data['mainColor']); ?> ;color:#fff !important;}

.pagenav  li li a:hover {background:none;}
.link-title-previous:hover, .link-title-next:hover {color:#fff;}
.su-quote-style-default {border-left:8px solid <?php echo esc_attr($pmc_data['mainColor']); ?>  !important; }
.addthis_toolbox {border-top:2px solid <?php echo esc_attr($pmc_data['mainColor']); ?>  !important; }
.blogpostcategory .post-author a:after {border-left:19px solid <?php echo esc_attr($pmc_data['gradient_color']); ?>  !important; }
.blogpostcategory .post-time a:before{border-right:19px solid <?php echo esc_attr($pmc_data['gradient_color']); ?>  !important;}
.widget h3 {border:1px solid <?php echo esc_attr($pmc_data['mainColor']); ?>;}
 /* ***********************
--------------------------------------
------------BOXED---------------------
-----------------------------------*/
<?php if($use_boxed == 0 &&  isset($pmc_data['use_background']) && $pmc_data['use_background'] == 1){ ?>
	body, .cf, .mainwrap, .post-full-width, .titleborderh2, .sidebar  {
	background:<?php echo esc_attr($pmc_data['body_background_color']).' '.$background ?>  !important; 
	}
	
<?php	} ?>
 <?php if(isset($pmc_data['use_boxed']) &&  $use_boxed == 1){ ?>
header,.outerpagewrap{background:none !important;}
header,.outerpagewrap,.mainwrap{background-color:<?php echo esc_attr($pmc_data['body_background_color']) ?> ;}
@media screen and (min-width:1120px){
body {width:1120px !important;margin:0 auto !important;}
.top-nav ul{margin-right: -21px !important;}
.mainwrap.shop {float:none;}
.pagenav.fixedmenu { width: 1220px !important;}
.bottom-support-tab,.totop{right:5px;}
<?php if($use_bg_full){ ?>
	body {
	background:<?php echo esc_attr($pmc_data['body_background_color']).' '.$background ?>  !important; 
	background-attachment:fixed !important;
	background-size:cover !important; 
border-right:1px solid #fff;
	-webkit-box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.2);
-moz-box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.2);
box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.2);
	}	
<?php	} ?>
 <?php if(!$use_bg_full){ ?>
	body {
	background:<?php echo esc_attr($pmc_data['body_background_color']).' '.$background ?>  !important; 
	
	}
	
<?php	} ?>	
}
<?php } ?>
 
 
 
 

/* ***********************
--------------------------------------
------------CUSTOM CSS----------
--------------------------------------
*********************** */

<?php echo pmc_stripText($pmc_data['custom_style']) ?>