<div class="largeImage">
<?php echo $form->create('LargeImage', array('type'=>'file'));?>
	<fieldset>
 		<legend><?php echo sprintf(__('Edit %s', true), __('LargeImage', true));?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('title');
		echo $form->input('project_id', array('empty'=>'None'));
		echo $form->input('includefade', array('label'=>'Include in fadeshow?'));
	?>
	</fieldset>
	<div class="submit"><input type="submit" value="Submit" /></div>
	<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('LargeImage.id')), array('class'=>'delete'), 
				sprintf(__('Are you sure you want to delete # %s?', true), $form->value('LargeImage.id'))); ?></li>
		<li><?php echo $html->link(sprintf(__('List %s', true), __('LargeImages', true)), array('action'=>'index'));?></li>
		<li><?php echo $html->link(sprintf(__('List %s', true), __('Projects', true)), array('controller'=> 'projects', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(sprintf(__('New %s', true), __('Project', true)), array('controller'=> 'projects', 'action'=>'add')); ?> </li>
		</div>
		</form>
	</ul>
</div>
