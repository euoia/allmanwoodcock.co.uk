<div class="service">
<h2><?php  __('Service');?></h2>
	<dl>
		<dt class="altrow"><?php __('Id') ?></dt>
		<dd class="altrow">
			<?php echo $service['Service']['id'] ?>
			&nbsp;
		</dd>
		<dt><?php __('Title') ?></dt>
		<dd>
			<?php echo $service['Service']['title'] ?>
			&nbsp;
		</dd>
		<dt class="altrow"><?php __('Description') ?></dt>
		<dd class="altrow">
			<?php echo $service['Service']['description'] ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(sprintf(__('Edit %s', true), __('Service', true)), array('action'=>'edit', $service['Service']['id'])); ?> </li>
		<li><?php echo $html->link(sprintf(__('Delete %s', true), __('Service', true)), array('action'=>'delete', 
					$service['Service']['id']), array('class'=>'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $service['Service']['id'])); ?> </li>
		<li><?php echo $html->link(sprintf(__('List %s', true), __('Services', true)), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(sprintf(__('New %s', true), __('Service', true)), array('action'=>'add')); ?> </li>
	</ul>
</div>
