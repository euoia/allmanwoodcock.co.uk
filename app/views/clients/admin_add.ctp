<div class="client">
<?php echo $form->create('Client');?>
	<fieldset>
 		<legend><?php echo sprintf(__('Add %s', true), __('Client', true));?></legend>
	<?php
		echo $form->input('name');
		echo $form->input('link');
	?>
	</fieldset>
	<div class="submit"><input type="submit" value="Submit" /></div>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(sprintf(__('List %s', true), __('Clients', true)), array('action'=>'index'));?></li>
	</ul>
</div>
