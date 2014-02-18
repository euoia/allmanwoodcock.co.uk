<div class="user">
<h2><?php  __('User');?></h2>
	<dl>
		<dt class="altrow"><?php __('Id') ?></dt>
		<dd class="altrow">
			<?php echo $user['User']['id'] ?>
			&nbsp;
		</dd>
		<dt><?php __('Username') ?></dt>
		<dd>
			<?php echo $user['User']['username'] ?>
			&nbsp;
		</dd>
		<dt class="altrow"><?php __('Password') ?></dt>
		<dd class="altrow">
			<?php echo $user['User']['password'] ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(sprintf(__('Edit %s', true), __('User', true)), array('action'=>'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $html->link(sprintf(__('Delete %s', true), __('User', true)), array('action'=>'delete', $user['User']['id']), array('class'=>'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?> </li>
		<li><?php echo $html->link(sprintf(__('List %s', true), __('Users', true)), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(sprintf(__('New %s', true), __('User', true)), array('action'=>'add')); ?> </li>
	</ul>
</div>
