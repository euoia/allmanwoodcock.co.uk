<div class="largeImage">
<h2><?php  __('LargeImage');?></h2>
	<dl>
		<dt class="altrow"><?php __('Id') ?></dt>
		<dd class="altrow">
			<?php echo $largeImage['LargeImage']['id'] ?>
			&nbsp;
		</dd>
		<dt><?php __('Url') ?></dt>
		<dd>
			<?php echo $largeImage['LargeImage']['url'] ?>
			&nbsp;
		</dd>
		<dt class="altrow"><?php __('Title') ?></dt>
		<dd class="altrow">
			<?php echo $largeImage['LargeImage']['title'] ?>
			&nbsp;
		</dd>
		<dt><?php __('Project') ?></dt>
		<dd>
			<?php echo $html->link(__($largeImage['Project']['title'], true), array('controller'=> 'projects', 'action'=>'view', $largeImage['Project']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php __('Preview') ?></dt>
		<dd>
			<?php echo $html->image(LARGE_IMAGE_DIR . $largeImage['LargeImage']['url'], array(
				'width'=>Configure::read('large_image_width'),
				'height'=>Configure::read('large_image_height')
			)); ?>
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(sprintf(__('Edit %s', true), __('LargeImage', true)), array('action'=>'edit', $largeImage['LargeImage']['id'])); ?> </li>
		<li><?php echo $html->link(sprintf(__('Delete %s', true), __('LargeImage', true)), array('action'=>'delete', $largeImage['LargeImage']['id']), array('class'=>'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $largeImage['LargeImage']['id'])); ?> </li>
		<li><?php echo $html->link(sprintf(__('List %s', true), __('LargeImages', true)), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(sprintf(__('New %s', true), __('LargeImage', true)), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(sprintf(__('List %s', true), __('Projects', true)), array('controller'=> 'projects', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(sprintf(__('New %s', true), __('Project', true)), array('controller'=> 'projects', 'action'=>'add')); ?> </li>
	</ul>
</div>
