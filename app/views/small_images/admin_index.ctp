<div class="smallImages">
<h3>Small images may be used as top level links or shown with a news item.</h3>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo "Preview";?></th>
	<th><?php echo $paginator->sort('url');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($smallImages as $smallImage):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $smallImage['SmallImage']['id'] ?>
		</td>
		<td>
		<?php echo $html->image(Configure::read('small_image_dir'). DS . 
				$smallImage['SmallImage']['url'], array(
				'width'=>Configure::read('small_image_width'),
				'height'=>Configure::read('small_image_height'))); ?>
		</td>
		<td>
			<?php echo $smallImage['SmallImage']['url'] ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $smallImage['SmallImage']['id']), array('class'=>'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $smallImage['SmallImage']['id'])); ?>
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
		<li><?php echo $html->link(sprintf(__('New %s', true), __('SmallImage', true)), array('action'=>'add')); ?></li>
		<li><?php echo $html->link(sprintf(__('List %s', true), __('Pages', true)), array('controller'=> 'pages', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(sprintf(__('New %s',  true), __('Page', true)), array('controller'=> 'pages', 'action'=>'add')); ?> </li>
	</ul>
</div>
