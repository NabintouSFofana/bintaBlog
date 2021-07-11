<?php
/**
 * The template for displaying search forms in Carrie
 *
 * @package Carrie
 */
?>
	<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="search" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php echo esc_attr__('Type keyword(s) here &hellip;', 'carrie' ); ?>" />
		<input type="submit" class="submit btn" id="searchsubmit" value="<?php echo esc_attr__( 'Search', 'carrie' ); ?>" />
	</form>
