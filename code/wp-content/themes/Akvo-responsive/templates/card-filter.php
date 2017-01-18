<div class='form-group'>
	<select name="akvo_<?php _e($arr['slug']);?>" onchange="this.form.submit()">
		<option value='0'><?php _e($arr['label']);?></option>
		<?php foreach($terms as $term):
			$is_selected = false;
			if($arr['id'] == $term->term_id){
				$is_selected = true;
			}
		?>
		<option <?php if($is_selected) _e("selected='selected'");?> value='<?php _e($term->term_id);?>'><?php _e($term->name);?></option>
		<?php endforeach;?>
	</select>
</div>