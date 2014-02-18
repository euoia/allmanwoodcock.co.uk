<div class="project">
<?php echo $form->create('Project');?>
	<fieldset>
 		<legend><?php echo sprintf(__('Edit %s', true), __('Project', true));?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('title');
		echo $form->input('description');
	?>
	</fieldset>
	<div class="submit"><input type="submit" value="Submit" /></div>
	<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Project.id')), 
				array('class'=>'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Project.id'))); ?></li>
		<li><?php echo $html->link(sprintf(__('List %s', true), __('Projects', true)), array('action'=>'index'));?></li>
		</div>
		</form>
	</ul>
</div>
