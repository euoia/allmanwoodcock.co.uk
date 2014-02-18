<div class="client">
<h2><?php  __('Client');?></h2>
	<dl>
		<dt class="altrow"><?php __('Id') ?></dt>
		<dd class="altrow">
			<?php echo $client['Client']['id'] ?>
			&nbsp;
		</dd>
		<dt><?php __('Name') ?></dt>
		<dd>
			<?php echo $client['Client']['name'] ?>
			&nbsp;
		</dd>
		<dt class="altrow"><?php __('Link') ?></dt>
		<dd class="altrow">
			<?php echo $client['Client']['link'] ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(sprintf(__('Edit %s', true), __('Client', true)), array('action'=>'edit', $client['Client']['id'])); ?> </li>
		<li><?php echo $html->link(sprintf(__('Delete %s', true), __('Client', true)), array('action'=>'delete', $client['Client']['id']), array('class'=>'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $client['Client']['id'])); ?> </li>
		<li><?php echo $html->link(sprintf(__('List %s', true), __('Clients', true)), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(sprintf(__('New %s', true), __('Client', true)), array('action'=>'add')); ?> </li>
	</ul>
</div>
