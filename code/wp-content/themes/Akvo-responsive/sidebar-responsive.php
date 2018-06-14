<aside id="sidebar-responsive" class="wrapper" role="complementary">
	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>
	<div class="widget">
		<h3 class="wtitle">Blog Categories</h3>
		<form action="<?php bloginfo('url'); ?>/" method="get">
			<?php
				$select = wp_dropdown_categories('show_option_none=Select Category&show_count=1&orderby=name&echo=0');
				$select = preg_replace("#<select([^>]*)>#", "<select$1 onchange='return this.form.submit()'>", $select);
				echo $select;
			?>
			<noscript><input type="submit" value="View" /></noscript>
		</form>
	</div>
	<div class="widget">
		<h3 class="title">Post Archives</h3>
		<ul>
			<select name="archive-dropdown" onChange='document.location.href=this.options[this.selectedIndex].value;'>
				<option value=""><?php echo attribute_escape(__('Select Month')); ?></option>
				<?php wp_get_archives('type=monthly&format=option&show_post_count=1'); ?>
			</select>
		</ul>
	</div>
	<?php endif; ?>
</aside>
<!-- /#sidebar-responsive -->