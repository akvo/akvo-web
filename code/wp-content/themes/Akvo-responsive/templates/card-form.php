<form style="background: #EEE;margin-bottom:30px;">
	<div class='page-section' style="padding:0;">
		<div class="row">	
			<?php foreach($filters as $filter):?>
			<div class="col-6">
				<?php akvo_dropdown_filters($filter);?>
			</div>
			<?php endforeach;?>
		</div>
	</div>	
</form>	

<style>
	
	.form-group label{
		font-size: inherit;
		cursor: inherit;
		margin: 0;
		
	}
	
	.form-group select{
		
		display: inline;
		margin: 0;
		min-width: 200px;
		width: auto;
	}
	
	
	.card-image{
		max-height: 300px;
		overflow:hidden;
		position: relative;
		display: inline;
	}
	.card-band{
		background: transparent;
		position: absolute;
		bottom:0;
		height: 10px;
		width: 100%;
	}
	.card-band.akvo-rsr{background: #72cdff;}
	.card-band.akvo-flow{background: #de8929;}
	.card-band.akvo-lumen{background: #74b631;}
	
	.card .card-title{
		margin-top: 0.1em;
		margin-bottom: 0em;
	}
	
	.card .text-muted{
		margin-top: 0em;
		color: #999;
	}
	
</style>