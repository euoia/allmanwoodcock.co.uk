<div class="users">
<h2><?php __('Users');?></h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('username');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($users as $user):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $user['User']['id'] ?>
		</td>
		<td>
			<?php echo $user['User']['username'] ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $user['User']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $user['User']['id']));  ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $user['User']['id']), array('class'=>'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id']));  ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(sprintf(__('New %s', true), __('User', true)), array('action'=>'add')); ?></li>
	</ul>
</div>
