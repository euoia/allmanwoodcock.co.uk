

<div class="smallImage">
<?php echo $form->create('SmallImage', array('type'=>'file'));?>
	<fieldset>
 		<legend><?php echo sprintf(__('Add %s', true), __('SmallImage', true));?></legend>
		<h3><i>The image should have dimensions WxH =
			<?php echo Configure::read('small_image_width') ?>px x <?php echo Configure::read('small_image_height') ?>px</i></h3>
	<?php
		echo $form->file('file');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(sprintf(__('List %s', true), __('SmallImages', true)), array('action'=>'index'));?></li>
		<li><?php echo $html->link(sprintf(__('List %s', true), __('Pages', true)), array('controller'=> 'pages', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(sprintf(__('New %s', true), __('Page', true)), array('controller'=> 'pages', 'action'=>'add')); ?> </li>
	</ul>
</div>
