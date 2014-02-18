<div class="newsItems">
<h3>Add, remove, or edit a news item.</h3>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('small_image_id');?></th>
	<th><?php echo $paginator->sort('date_presented');?></th>
	<th><?php echo $paginator->sort('text');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($newsItems as $newsItem):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $newsItem['NewsItem']['id'] ?>
		</td>
		<td>
			<?php if(!empty($newsItem['SmallImage']['id'])) { ?>
				<?php echo $html->link(__($newsItem['SmallImage']['title'], true), array('controller'=> 'small_images', 'action'=>'view', $newsItem['SmallImage']['id'])); ?>
			<?php } else { ?>
				<?php echo "<i>Image not available</i>" ?>
			<?php } ?>
		</td>
		<td>
			<?php echo $newsItem['NewsItem']['date_presented'] ?>
		</td>
		<td class="longTableText">
			<?php echo $newsItem['NewsItem']['text'] ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $newsItem['NewsItem']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $newsItem['NewsItem']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $newsItem['NewsItem']['id']), array('class'=>'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $newsItem['NewsItem']['id'])); ?>
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
		<li><?php echo $html->link(sprintf(__('New %s', true), __('NewsItem', true)), array('action'=>'add')); ?></li>
		<li><?php echo $html->link(sprintf(__('List %s', true), __('SmallImages', true)), array('controller'=> 'small_images', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(sprintf(__('New %s',  true), __('SmallImage', true)), array('controller'=> 'small_images', 'action'=>'add')); ?> </li>
	</ul>
</div>
