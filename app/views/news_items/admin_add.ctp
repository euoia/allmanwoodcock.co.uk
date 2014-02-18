<? echo $this->element('tiny_mce'); ?>
<div class="newsItem">
<?php echo $form->create('NewsItem');?>
	<fieldset>
 		<legend><?php echo sprintf(__('Add %s', true), __('NewsItem', true));?></legend>
	<?php
		echo $form->input('small_image_id');
		echo $form->input('date_presented');
	?>
		<div id="text-area">
			<?php	echo $form->input('text', array('style'=>'width:550px')); ?>
		</div>
	</fieldset>
	<div class="submit"><input type="submit" value="Submit" /></div>
	<div class="actions">
	<ul>
		<li><?php echo $html->link(sprintf(__('List %s', true), __('NewsItems', true)), array('action'=>'index'));?></li>
		<li><?php echo $html->link(sprintf(__('List %s', true), __('SmallImages', true)), array('controller'=> 'small_images', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(sprintf(__('New %s', true), __('SmallImage', true)), array('controller'=> 'small_images', 'action'=>'add')); ?> </li>
	</ul>
	</div>
	</form>
</div>
