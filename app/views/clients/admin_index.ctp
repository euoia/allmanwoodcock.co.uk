<div class="clients">
<h3>Add, edit, or remove a client, optionally providing a link to their website.</h3>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('link');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($clients as $client):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $client['Client']['id'] ?>
		</td>
		<td>
			<?php echo $client['Client']['name'] ?>
		</td>
		<td>
			&nbsp<?php if($client['Client']['link'] != '')echo $html->link($client['Client']['link']) ?>
		</td>
		<td class="actions">
			<?php echo $html->link('View', array('action'=>'view', $client['Client']['id'])); ?>
			<?php echo $html->link('Edit', array('action'=>'edit', $client['Client']['id'])); ?>
			<?php echo $html->link('Delete', array('action'=>'delete', $client['Client']['id']), array('class'=>'delete'), sprintf('Are you sure you want to delete # %s?', $client['Client']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.'previous', array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next('next'.' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(sprintf('New %s', 'Client'), array('action'=>'add')); ?></li>
	</ul>
</div>
