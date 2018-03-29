<?php
/**
 *
 * @package WordPress
 * @subpackage akvo.org
 */
?>
<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="field" name="s" id="s" placeholder="<?php if( !is_akvo_full_black_body() ){ esc_attr_e( 'Search', 'akvo.org' ); } ?>" />
	<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'akvo.org' ); ?>" />
</form>
