<?php
// Theme Options
$ailsa_need_copyright = cs_get_option('need_copyright');
$ailsa_footer_copyright_layout = cs_get_option('footer_copyright_layout');

if ($ailsa_footer_copyright_layout === 'copyright-1') {
  $ailsa_copyright_layout_class = 'col-lg-6 col-md-6 col-sm-6 col-xs-12 aisa-left';
  $ailsa_copyright_seclayout_class = 'col-lg-6 col-md-6 col-sm-6 col-xs-12 aisa-right';
} elseif ($ailsa_footer_copyright_layout === 'copyright-2') {
  $ailsa_copyright_layout_class = 'col-lg-12 col-md-12 col-sm-12 col-xs-12 aisa-center';
} else {
  $ailsa_copyright_layout_class = '';
  $ailsa_copyright_seclayout_class = '';
}

if (isset($ailsa_need_copyright)) {
?>
<!-- Copyright Bar -->
<div class="aisa-copyright">
  <div class="container">
    <div class="row">
      <div class="<?php echo esc_attr($ailsa_copyright_layout_class); ?>">
		<?php
		  $ailsa_copyright_text = cs_get_option('copyright_text');
		  echo do_shortcode($ailsa_copyright_text);
		?>
      </div>
      <?php if ($ailsa_footer_copyright_layout != 'copyright-2') { ?>
      <div class="<?php echo esc_attr($ailsa_copyright_seclayout_class); ?>">
		<?php
		  $ailsa_secondary_text = cs_get_option('secondary_text');
		  echo do_shortcode($ailsa_secondary_text);
		?>
      </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- Copyright Bar -->

<?php if ($ailsa_footer_copyright_layout === 'copyright-1') { ?>
<div class="aisa-right scrolling" style="display: none;">
  <a href="#"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
</div>
<?php }

} ?>
