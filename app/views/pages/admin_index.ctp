<div class="pages">
<h3>Modify the top level pages. You may change the link image, the first slideshow image, and the text.</h3>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('title');?></th>
	<th><?php echo $paginator->sort('meta_description');?></th>
	<th><?php echo $paginator->sort('text');?></th>
	<th class="actions" width="100"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;

foreach ($pages as $i => $page):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $page['Page']['id'] ?>
		</td>
		<td>
			<?php echo $page['Page']['name'] ?>
		</td>
		<td>
			<?php echo $page['Page']['title'] ?>
		</td>
		<td>
			<?php if(empty($page['Page']['meta_description'])) { ?>
				&nbsp
			<?php } else { ?>
				<?php echo $page['Page']['meta_description'] ?>
			<?php } ?>
		</td>
		<td class="longTableText">
		<?php if(empty($page['Page']['text'])) { ?>
			&nbsp
		<?php } else { ?>
			<?php echo $page['Page']['text'] ?>
		<?php } ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), '/'.$page['Page']['name']); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $page['Page']['id'])); ?>
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
</div>

