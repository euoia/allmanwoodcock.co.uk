<?php $this->Html->css('portfolio_edit_override', null, array('inline' => false)); ?>

<div class="portfolio">
<?php echo $this->Form->create('Portfolio');?>
	<fieldset>
 		<legend><?php echo sprintf(__('Edit %s', true), __('Portfolio', true));?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		//echo $form->input('Project', array('label'=>'Projects'));
		echo $this->Form->input('Project', array(
			'label'=>'Projects',
			'type'=>'select',
			'multiple'=>'checkbox'
		));
	?>
	</fieldset>
	<div class="submit"><input type="submit" value="Submit" /></div>
	<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), 
				array('action'=>'delete', $form->value('Portfolio.id')), 
				array('class'=>'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Portfolio.id'))); ?></li>
		<li><?php echo $html->link(sprintf(__('List %s', true), __('Portfolios', true)), array('action'=>'index'));?></li>
		<li><?php echo $html->link(sprintf(__('List %s', true), __('Projects', true)), array('controller'=> 'projects', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(sprintf(__('New %s', true), __('Project', true)), array('controller'=> 'projects', 'action'=>'add')); ?> </li>
	</ul>
	</div>
	</form>
</div>
