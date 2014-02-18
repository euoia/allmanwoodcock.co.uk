<div class="project">
<h2><?php  __('Project');?></h2>
	<dl>
		<dt class="altrow"><?php __('Id') ?></dt>
		<dd class="altrow">
			<?php echo $project['Project']['id'] ?>
			&nbsp;
		</dd>
		<dt><?php __('Title') ?></dt>
		<dd>
			<?php echo $project['Project']['title'] ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(sprintf(__('Edit %s', true), __('Project', true)), array('action'=>'edit', $project['Project']['id'])); ?> </li>
		<li><?php echo $html->link(sprintf(__('Delete %s', true), __('Project', true)), array('action'=>'delete', $project['Project']['id']), array('class'=>'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $project['Project']['id'])); ?> </li>
		<li><?php echo $html->link(sprintf(__('List %s', true), __('Projects', true)), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(sprintf(__('New %s', true), __('Project', true)), array('action'=>'add')); ?> </li>
	</ul>
</div>
