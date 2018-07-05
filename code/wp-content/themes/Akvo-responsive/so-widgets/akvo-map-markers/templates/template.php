<?php
	
	global $akvo_widgets_template;
	
	$map_url = $akvo_widgets_template->get_image_url( $instance['map'] );
	
?>
<div class="map-markers" style='background-image:url("<?php echo $map_url;?>");'>
	<?php foreach( $instance['markers'] as $marker ): $img_src = $akvo_widgets_template->get_image_url( $marker['image'] );?>
	<a target="_blank" href="<?php echo $marker['link'];?>" style='left:<?php echo $marker['left'];?>%;top:<?php echo $marker['top'];?>%;'>
		<img src="<?php echo $img_src;?>" />
	</a>
	<?php endforeach;?>
</div>