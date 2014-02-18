<div class="portfolio">
<?php echo $form->create('Portfolio');?>
	<fieldset>
 		<legend><?php echo sprintf(__('Add %s', true), __('Portfolio', true));?></legend>
	<?php
		echo $form->input('title');
		 echo $form->input('Project');
	?>
	</fieldset>
	<div class="submit"><input type="submit" value="Submit" /></div>
	<div class="actions">
	<ul>
		<li><?php echo $html->link(sprintf(__('List %s', true), __('Portfolios', true)), array('action'=>'index'));?></li>
		<li><?php echo $html->link(sprintf(__('List %s', true), __('Projects', true)), array('controller'=> 'projects', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(sprintf(__('New %s', true), __('Project', true)), array('controller'=> 'projects', 'action'=>'add')); ?> </li>
	</ul>
	</div>
	</form>
</div>
