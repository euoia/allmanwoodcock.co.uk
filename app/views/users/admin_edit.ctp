<div class="user">
<?php echo $form->create('User');?>
	<fieldset>
 		<legend><?php echo sprintf(__('Edit %s', true), __('User', true));?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('username');
		echo $form->input('password');
	?>
	</fieldset>
	<div class="submit"><input type="submit" value="Submit" /></div>
	<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('User.id')), array('class'=>'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $form->value('User.id'))); ?></li>
		<li><?php echo $html->link(sprintf(__('List %s', true), __('Users', true)), array('action'=>'index'));?></li>
	</ul>
	</div>
	</form>
</div>
