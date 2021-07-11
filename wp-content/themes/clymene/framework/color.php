<?php
$root =dirname(dirname(dirname(dirname(dirname(__FILE__)))));
if ( file_exists( $root.'/wp-load.php' ) ) {
    require_once( $root.'/wp-load.php' );
} elseif ( file_exists( $root.'/wp-config.php' ) ) {
    require_once( $root.'/wp-config.php' );
}
header("Content-type: text/css; charset=utf-8");
global $clymene_option; 
?>
/* Color Theme - Amethyst /Violet/

color - <?php echo esc_attr( $clymene_option['main-color'] ); ?>

/* 01 MAIN STYLES
****************************************************************************************************/
.animsition-loading:after{
  content:"<?php echo esc_attr( $clymene_option['preloadtext'] ); ?>";
}

a,
.color-1,
.color-2,
.color-3,
.color-4, 
.color-5, 
.color-6{
  color: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}

/**** Custom Color ****/


a,
.color-1,
.color-2,
.color-3,
.color-4, 
.color-5, 
.color-6{
  color: <?php echo esc_attr( $clymene_option['main-color'] ); ?>; 
}

  
.styled-icon-1:hover,
.styled-icon-2:hover,
.styled-icon-3,
.styled-icon-4:hover{
  background:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.styled-icon-2:hover,
.styled-icon-4{
  border:2px solid <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}

.animsition-loading:after{
  color:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.color-small, .portfolio-box-2 h6 a:hover{
  color:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.orange-heavy{
  color:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
a.arrow-down:hover{
  border:2px solid <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.subtitle-written{
  color:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.services-boxes-1 .icon-box{
  background:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.services-boxes-1:hover .icon-box,
.quote-big-post-single h5:hover,
.link-big-post-single h5:hover{
  color:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.cd-timeline-img {
  background: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.cd-timeline-content .cd-read-more {
  border:2px solid <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.no-touch .cd-timeline-content .cd-read-more:hover {
  background-color: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.cd-timeline-content .cd-date {
  color:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.facts-box-1-num{
  color:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.facts-box-2 h6{
  color:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}  
.cd-single-point > a {
  background: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.ajax-project-info li i{
  color:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.ajax-link{
  color:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.blog-box-1.link-post{
  background:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.blog-left-right-links .blog-left-link:hover {
  background:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.blog-left-right-links .blog-right-link:hover {
  background:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.color-write{
  color:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.tooltip-inner-shop {
  background:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.shop-box .shop-price span{
  color:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.shop-box .mask-left-shop{
  background:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.shop-box .mask-left-shop:hover{
  color:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.shop-box .mask-right-shop{
  background:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.shop-box .mask-right-shop:hover{
  color:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.page-top-icon{
  color:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}


.call-to-action-1 .button-1{
  border:2px solid <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.call-to-action-1 .button-1:hover{
  background: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.call-to-action-1 .action-top-1{
  color:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.call-to-action-2 .button-2{
  border:2px solid <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.call-to-action-2 .button-2:hover{
  background: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.blockquotes-1 p span{ 
  color: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.blockquotes-1 img{ 
  border:4px solid <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.cd-pricing-switcher .fieldset {
  background:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.blockquotes-1  .arrow-right{
  border-top:7px solid <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
} 
.blockquotes-1  .company-name{ 
  color: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.button-slider:hover{
  border:2px solid <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
  background:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.portfolio-box-2:hover h6{
  color: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.services-boxes-2 .icon-box{
  color: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.services-boxes-2:hover h6{
  color: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.slider-text-color{
  color: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.team-box-1 .team-box-1-text-in h6{
  color: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.team-social li:hover.icon-team a {
  color: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.list-social li.icon-soc a, .soc-icons a i, .footer-1 i {
  color: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.smk_accordion .accordion_in .acc_head:hover {
  background:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.smk_accordion .accordion_in.acc_active > .acc_head {
  background:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.blog-box-1 .blog-date-1{
  background:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.blog-box-1 .blog-comm-1{
  background:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.blog-box-1:hover .link{
  color:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.blog-box-4:hover .link{
  color:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.blog-box-4 h6{
  color:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.team-box-1 .tooltip-shape svg {
  stroke: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
#filter li .current,
#filter li a:hover{
  color:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.footer-1 p a:hover{
  color: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
} 
.icon-footer{
  color: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
} 
.portfolio-box-2 .mask-left{
  background:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.portfolio-box-2 .mask-right{
  background:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.portfolio-box-2 .mask-left:hover {
  color:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.portfolio-box-2 .mask-right:hover {
  color:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.portfolio-box-3 .mask-left{
  background:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.portfolio-box-3 .mask-right{
  background:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.portfolio-box-3 .mask-left:hover {
  color:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.portfolio-box-3 .mask-right:hover {
  color:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.color-big{
  color:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.owl-theme .owl-controls .owl-page.active span,
.owl-theme .owl-controls.clickable .owl-page:hover span{
  background:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
#owl-top-page-slider.owl-theme .owl-controls .owl-page.active span,
#owl-top-page-slider.owl-theme .owl-controls.clickable .owl-page:hover span{
  background:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
#carousel-team-3col.owl-theme .owl-controls .owl-page.active span,
#carousel-team-3col.owl-theme .owl-controls.clickable .owl-page:hover span{
  background:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
#carousel-team-4col.owl-theme .owl-controls .owl-page.active span,
#carousel-team-4col.owl-theme .owl-controls.clickable .owl-page:hover span{
  background:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.fullscreen-title-home b,
.fullscreen-title-home strong{
  color:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.button-map:hover {
  background:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
#button-con input:hover{
  border:2px solid <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
  background: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.cd-loader {
  background-color: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.no-touch .btn:hover {
  background-color: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.btn.salmon {
  background-color: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.no-touch .btn.salmon:hover {
  color: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.pro-bar {
  background: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}

.services-boxes-2:hover .icon-box.full-icon-box{
  background:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}

.csstransforms3d .social-top a:hover span::before,
.csstransforms3d .social-top a:focus span::before{
  color:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.social-top a span {
  background:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.content-style-overlay .menu-in-overlay li .cl-effect-11 a::before {
  color:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.content-style-overlay .menu-in-overlay li p{
  color:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.content-style-overlay .menu-in-overlay li p span{
  border-bottom:1px solid <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.cd-primary-nav .see-all a {
  /* different style for the See all button on mobile and tablet */
  color: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.cd-overlay {
  background-color: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
@media only screen and (min-width: 1170px) {
  .cd-primary-nav > li > a:hover {
    color: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
  }
  .cd-primary-nav > li > a.selected {
    color: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
    box-shadow: inset 0 -2px 0 <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
  }
  .cd-primary-nav .cd-secondary-nav > li > a {
    /* secondary nav title */
    color: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
  }
  .cd-primary-nav .cd-secondary-nav a:hover {
    color: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
  }
  .cd-primary-nav .cd-nav-gallery .cd-nav-item h3 {
    color: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
  }
  .cd-primary-nav .cd-nav-icons .cd-nav-item h3 {
    color: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
  }
  .has-children > a:hover::before, .has-children > a:hover::after, .go-back a:hover::before, .go-back a:hover::after {
    background: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
  }
}




@-webkit-keyframes cd-pulse {
  0% {
    -webkit-transform: scale(1);
    box-shadow: inset 0 0 1px 1px rgba(207, 161, 68, 0.8);
  }
  50% {
    box-shadow: inset 0 0 1px 1px rgba(207, 161, 68, 0.8);
  }
  100% {
    -webkit-transform: scale(1.6);
    box-shadow: inset 0 0 1px 1px rgba(207, 161, 68, 0);
  }
}
@-moz-keyframes cd-pulse {
  0% {
    -moz-transform: scale(1);
    box-shadow: inset 0 0 1px 1px rgba(207, 161, 68, 0.8);
  }
  50% {
    box-shadow: inset 0 0 1px 1px rgba(207, 161, 68, 0.8);
  }
  100% {
    -moz-transform: scale(1.6);
    box-shadow: inset 0 0 1px 1px rgba(207, 161, 68, 0);
  }
}
@keyframes cd-pulse {
  0% {
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    -o-transform: scale(1);
    transform: scale(1);
    box-shadow: inset 0 0 1px 1px rgba(207, 161, 68, 0.8);
  }
  50% {
    box-shadow: inset 0 0 1px 1px rgba(207, 161, 68, 0.8);
  }
  100% {
    -webkit-transform: scale(1.6);
    -moz-transform: scale(1.6);
    -ms-transform: scale(1.6);
    -o-transform: scale(1.6);
    transform: scale(1.6);
    box-shadow: inset 0 0 1px 1px rgba(207, 161, 68, 0);
  }
}


.cd-select:hover,
.cd-popular .cd-select:hover{
    background-color: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
  .cd-currency, .cd-duration {
    color: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
  }
  .cd-popular .cd-currency, .cd-popular .cd-duration {
    color: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
  }
  .cd-secondary-theme .cd-currency, .cd-secondary-theme .cd-duration {
    color: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
  }
  .cd-secondary-theme .cd-popular .cd-currency, .cd-secondary-theme .cd-popular .cd-duration {
    color: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
  }




.post-sidebar input:active,
.post-sidebar input:focus {
  background: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.tagcloud a:hover{
  background: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
  border-color:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.widget a:hover{
  color: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}



.blog-big-wrapper a:hover h5{ 
  color: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.blog-big-wrapper .link-to-post{
  color: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.blog-big-wrapper .big-post-date{ 
  background: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
blockquote p{ 
  border-left:3px solid <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.post-tags-categ p a:hover{
  color:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.post-content-comment .reply a:hover,
.post-content-com-top p span,
.list-social-share li:hover.icon-soc-share a{ 
  color: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.leave-reply input:active,
.leave-reply input:focus,
.leave-reply textarea:active,
.leave-reply textarea:focus {
  background: <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.coming-soon span,
.blockquotes-box-1 p span,
.shop-item-details .price span,
.leave-reply input[type=submit]{
  color:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.shop-item-details .button-shop,
.leave-reply input[type=submit]:hover{
  background: <?php echo esc_attr( $clymene_option['main-color'] ); ?>; 
}
.button-shortcodes.version-1:hover {
  border:2px solid <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
  background: <?php echo esc_attr( $clymene_option['main-color'] ); ?>; 
}
.button-shortcodes.version-3 {
  background:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}
.button-shortcodes.version-3:hover {
  box-shadow: 0 3px 0 <?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}


#sync-sortcodes-8 .item:hover,
#sync-sortcodes-8 .synced .item,
#sync-sortcodes-6 .item:hover,
#sync-sortcodes-6 .synced .item,
#sync-sortcodes-4 .item:hover,
#sync-sortcodes-4 .synced .item, .cd-primary-nav ul a:hover,
div.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab > a:hover,
div.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab.vc_active > a,
div.vc_tta-accordion.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-title > a:hover,
div.vc_tta-accordion.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title > a {
  background:<?php echo esc_attr( $clymene_option['main-color'] ); ?>;
}

.footer-1{
	background: <?php echo esc_attr( $clymene_option['background_footer'] ); ?>;
} 
.footer-bottom {
	background: <?php echo esc_attr( $clymene_option['sub_footer'] ); ?>;
}
