<div class="largeImages">
<h3>Large images are assigned to a project and shown in the portfolio section, as well as being used in the slideshow.</h3>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo "Preview";?></th>
	<th><?php echo $paginator->sort('includefade');?></th>
	<th><?php echo $paginator->sort('url');?></th>
	<th><?php echo $paginator->sort('title');?></th>
	<th><?php echo $paginator->sort('project_id');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($largeImages as $largeImage):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $largeImage['LargeImage']['id'] ?>
		</td>
		<td>
			<?php echo $html->image(Configure::read('large_image_dir') . DS . $largeImage['LargeImage']['url'], array(
				'width'=>Configure::read('large_image_thumb_width'),
				'height'=>Configure::read('large_image_thumb_height')
			)); ?>
		</td>
		<td>
			<?php if($largeImage['LargeImage']['includefade']) echo $html->image('tick-green.png') ?>
		</td>
		<td>
			<?php echo $largeImage['LargeImage']['url'] ?>
		</td>
		<td>
			<?php echo $largeImage['LargeImage']['title'] ?>
		</td>
		<td>
			<?php 
				if($largeImage['LargeImage']['project_id'])
					echo $html->link(__($largeImage['Project']['title'], true), 
							array('controller'=> 'projects', 'action'=>'view', $largeImage['Project']['id']));
				else
					echo "None"
			?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $largeImage['LargeImage']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $largeImage['LargeImage']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $largeImage['LargeImage']['id']), array('class'=>'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $largeImage['LargeImage']['id'])); ?>
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
		<li><?php echo $html->link(sprintf(__('New %s', true), __('LargeImage', true)), array('action'=>'add')); ?></li>
		<li><?php echo $html->link(sprintf(__('List %s', true), __('Projects', true)), array('controller'=> 'projects', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(sprintf(__('New %s',  true), __('Project', true)), array('controller'=> 'projects', 'action'=>'add')); ?> </li>
	</ul>
</div>
