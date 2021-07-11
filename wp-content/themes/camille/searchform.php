<?php
/**
 * The template for displaying search forms in Camille
 *
 * @package Camille
 */
?>
	<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="search" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php echo esc_attr__('Type keyword(s) & hit Enter&hellip;', 'camille' ); ?>" />
		<input type="submit" class="submit btn" id="searchsubmit" value="<?php echo esc_attr__( 'Search', 'camille' ); ?>" />
	</form>
