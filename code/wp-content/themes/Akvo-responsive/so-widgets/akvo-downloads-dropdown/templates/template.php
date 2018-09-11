<?php if( isset( $instance['downloads'] ) ):?>
<div class="fullWidthParag" data-behaviour='downloads-dropdown'>
	<select class="articlesdropdown selectpicker" data-style="btn-primary">
		<option class="selectdownloadoption" disabled selected>Click here to select your download</option>
		<?php foreach( $instance['downloads'] as $download ):?>
		<option value="<?php _e( $download['link'] );?>"><?php _e( $download['label'] );?></option>
		<?php endforeach;?>
	</select>
	<a href="#" target='_blank' class="buttonblack">Download</a>
</div>
<style>

	[data-behaviour~=downloads-dropdown] .buttonblack{
		font-size: 16px;
		-ms-box-sizing			: border-box;
		-moz-box-sizing			: border-box;
		box-sizing				: border-box;
		font-family				: Arial, Helvetica, Geneva, sans-serif;
		padding					: 1em 2em;
		background				: transparent;
		border					: 2px solid #000000;
		color					: #000000;
		-webkit-border-radius	: 0em;
		-moz-border-radius		: 0em;
		border-radius			: 0em;
		text-shadow				: 0 1px 0 rgba(0, 0, 0, 0.05);
		text-align				: center;
		display					: inline-block;
		cursor					: pointer;
		text-decoration			: none;
		line-height				: 1em;
		margin					: 0 auto;
	}
	
	.articlesdropdown{
		padding				: 17px 10px;
		width				: 80%;
		margin-right		: 2%;
		display				: inline-block;
		-webkit-appearance	: none;
	}
</style>
<?php endif; ?>
	
