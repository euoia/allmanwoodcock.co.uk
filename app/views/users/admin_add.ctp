<div class="user">
<?php echo $form->create('User');?>
	<fieldset>
 		<legend><?php echo sprintf(__('Add %s', true), __('User', true));?></legend>
	<?php
		echo $form->input('username');
		echo $form->input('password');
	?>
	</fieldset>
	<div class="submit"><input type="submit" value="Submit" /></div>
	<div class="actions">
	<ul>
		<li><?php echo $html->link(sprintf(__('List %s', true), __('Users', true)), array('action'=>'index'));?></li>
	</ul>
	</div>
	</form>
</div>
