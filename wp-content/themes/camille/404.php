<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Camille
 */

get_header(); ?>
<div class="content-block">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page-404">
					<h1><?php esc_html_e("404", 'camille'); ?></h1>
					<?php
					// Site 404 Banner
					camille_banner_show('404');
					?>
					<p><?php esc_html_e( 'The page you were looking for could not be found.', 'camille' ); ?></p>
					<p><?php esc_html_e( 'You may have typed the address incorrectly or you may have used an outdated link. Try search our site.', 'camille' ); ?></p>
					<div class="search-form">
						<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
							<input type="search" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php echo esc_attr__( 'Search &hellip;', 'camille' ); ?>" /><input type="submit" class="submit btn" id="searchsubmit" value="<?php echo esc_attr__( 'Search', 'camille' ); ?>" />
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
