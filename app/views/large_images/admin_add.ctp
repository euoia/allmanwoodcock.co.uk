<div class="largeImage">
<?php echo $form->create('LargeImage', array('type'=>'file'));?>
	<fieldset>
 		<legend><?php echo sprintf(__('Add %s', true), __('LargeImage', true));?></legend>
		<h3><i>The image should have dimensions WxH = <?php echo Configure::read('large_image_width') ?>px x <?php echo Configure::read('large_image_height') ?>px</i></h3>
	<?php
		echo $form->input('file', array('type'=>'file', 'label'=>'Upload a file'));
		echo $form->input('title');
		echo $form->input('project_id', array('empty'=>'None'));
		echo $form->input('includefade', array('label'=>'Include in fadeshow?'));
		?>
	</fieldset>
	<div class="submit"><input type="submit" value="Submit" /></div>
	<div class="actions">
	<ul>
		<li><?php echo $html->link(sprintf(__('List %s', true), __('LargeImages', true)), array('action'=>'index'));?></li>
		<li><?php echo $html->link(sprintf(__('List %s', true), __('Projects', true)), array('controller'=> 'projects', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(sprintf(__('New %s', true), __('Project', true)), array('controller'=> 'projects', 'action'=>'add')); ?> </li>
	</ul>
	</div>
	</form>
</div>
