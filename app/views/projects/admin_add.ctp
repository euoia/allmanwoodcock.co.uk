<div class="project">
<?php echo $form->create('Project');?>
	<fieldset>
 		<legend><?php echo sprintf(__('Add %s', true), __('Project', true));?></legend>
	<?php
		echo $form->input('title');
		echo $form->input('description');
	?>
	</fieldset>
	<div class="submit"><input type="submit" value="Submit" /></div>
	<div class="actions">
	<ul>
		<li><?php echo $html->link(sprintf(__('List %s', true), __('Projects', true)), array('action'=>'index'));?></li>
	</ul>
	</div>
	</form>
</div>
