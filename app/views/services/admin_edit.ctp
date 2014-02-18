<? echo $this->element('tiny_mce'); ?>
<div class="service">
<?php echo $form->create('Service');?>
	<fieldset>
 		<legend><?php echo sprintf(__('Edit %s', true), __('Service', true));?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('title');
		echo $form->input('description', array('style'=>'width:550px'));
	?>
	</fieldset>
	<div class="submit"><input type="submit" value="Submit" /></div>
	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Service.id')), array('class'=>'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Service.id'))); ?></li>
			<li><?php echo $html->link(sprintf(__('List %s', true), __('Services', true)), array('action'=>'index'));?></li>
		</ul>
	</div>
</form>
</div>
