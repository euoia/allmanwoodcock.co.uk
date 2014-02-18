<div class="client">
<?php echo $form->create('Client');?>
	<fieldset>
 		<legend><?php echo sprintf(__('Edit %s', true), __('Client', true));?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
		echo $form->input('link');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Client.id')), array('class'=>'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Client.id'))); ?></li>
		<li><?php echo $html->link(sprintf(__('List %s', true), __('Clients', true)), array('action'=>'index'));?></li>
	</ul>
</div>
