<?php
	
	global $akvo_widgets_template;
	
	$map_url = $akvo_widgets_template->get_image_url( $instance['map'] );
	
?>
<div style='position:relative;background-image:url("<?php echo $map_url;?>");padding-bottom:49%;width:100%;background-repeat:no-repeat;background-position:center;background-size:91%;'>
	<?php foreach( $instance['markers'] as $marker ): $img_src = $akvo_widgets_template->get_image_url( $marker['image'] );?>
	<a target="_blank" href="<?php echo $marker['link'];?>" style='position:absolute; left:<?php echo $marker['left'];?>%;top:<?php echo $marker['top'];?>%;'>
		<img src="<?php echo $img_src;?>" />
	</a>
	<?php endforeach;?>
</div>