<div class="portfolio">
<h2><?php  __('Portfolio');?></h2>
	<dl>
		<dt class="altrow"><?php __('Id') ?></dt>
		<dd class="altrow">
			<?php echo $portfolio['Portfolio']['id'] ?>
			&nbsp;
		</dd>
		<dt><?php __('Name') ?></dt>
		<dd>
			<?php echo $portfolio['Portfolio']['title'] ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(sprintf(__('Edit %s', true), __('Portfolio', true)), array('action'=>'edit', $portfolio['Portfolio']['id'])); ?> </li>
		<li><?php echo $html->link(sprintf(__('Delete %s', true), __('Portfolio', true)), array('action'=>'delete', $portfolio['Portfolio']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $portfolio['Portfolio']['id'])); ?> </li>
		<li><?php echo $html->link(sprintf(__('List %s', true), __('Portfolios', true)), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(sprintf(__('New %s', true), __('Portfolio', true)), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(sprintf(__('List %s', true), __('Projects', true)), array('controller'=> 'projects', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(sprintf(__('New %s', true), __('Project', true)), array('controller'=> 'projects', 'action'=>'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo sprintf(__('Related %s', true), __('Projects', true));?></h3>
	<?php if (!empty($portfolio['Project'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id') ?></th>
		<th><?php __('Title') ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($portfolio['Project'] as $project):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $project['id'];?></td>
			<td><?php echo $project['title'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'projects', 'action'=>'view', $project['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'projects', 'action'=>'edit', $project['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller'=> 'projects', 'action'=>'delete', $project['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $project['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
	<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(sprintf(__('New %s', true), __('Project', true)), array('controller'=> 'projects', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
