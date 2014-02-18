<div class="portfolios">
<h3>Add, edit, or remove a portfolio item. Each portfolio item is made up of several projects.</h3>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('title');?></th>
	<th><?php echo "Projects" ?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($portfolios as $portfolio):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $portfolio['Portfolio']['id'] ?>
		</td>
		<td>
			<?php echo $portfolio['Portfolio']['title'] ?>
		</td>
		<td>
			<?php
				foreach($portfolio['Project'] as $project) :
					echo $project['title'] . '<br>';
				endforeach; 
			?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $portfolio['Portfolio']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $portfolio['Portfolio']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $portfolio['Portfolio']['id']), array('class'=>'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $portfolio['Portfolio']['id'])); ?>
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
		<li><?php echo $html->link(sprintf(__('New %s', true), __('Portfolio', true)), array('action'=>'add')); ?></li>
		<li><?php echo $html->link(sprintf(__('List %s', true), __('Projects', true)), array('controller'=> 'projects', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(sprintf(__('New %s',  true), __('Project', true)), array('controller'=> 'projects', 'action'=>'add')); ?> </li>
	</ul>
</div>
