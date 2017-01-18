<form style="background: #EEE;">
	<div class='page-section' style="padding:0;">
		<div class="row">	
			<?php foreach($filters as $filter):?>
			<div class="col-4"><?php akvo_dropdown_filters($filter);?></div>
			<?php endforeach;?>
		</div>
	</div>	
</form>	