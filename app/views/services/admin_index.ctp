<div class="services">
<h3>Add, edit, or remove a service item.</h3>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('title');?></th>
	<th><?php echo $paginator->sort('description');?></th>
	<th class="actions" width="165px"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($services as $service):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $service['Service']['id'] ?>
		</td>
		<td>
			<?php echo $service['Service']['title'] ?>
		</td>
		<td class="longTableText">
			<?php echo $service['Service']['description'] ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), '/services/' . $service['Service']['slug']); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $service['Service']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $service['Service']['id']), array('class'=>'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $service['Service']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(sprintf(__('New %s', true), __('Service', true)), array('action'=>'add')); ?></li>
	</ul>
</div>
