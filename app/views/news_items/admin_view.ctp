<div class="newsItem">
<h2><?php  __('NewsItem');?></h2>
	<dl>
		<dt class="altrow"><?php __('Id') ?></dt>
		<dd class="altrow">
			<?php echo $newsItem['NewsItem']['id'] ?>
			&nbsp;
		</dd>
		<dt><?php __('SmallImage') ?></dt>
		<dd>
			<?php echo $html->link(__($newsItem['SmallImage']['title'], true), array('controller'=> 'small_images', 'action'=>'view', $newsItem['SmallImage']['id'])); ?>
			&nbsp;
		</dd>
		<dt class="altrow"><?php __('Date') ?></dt>
		<dd class="altrow">
			<?php echo $newsItem['NewsItem']['date_presented'] ?>
			&nbsp;
		</dd>
		<dt><?php __('Text') ?></dt>
		<dd>
			<?php echo $newsItem['NewsItem']['text'] ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(sprintf(__('Edit %s', true), __('NewsItem', true)), array('action'=>'edit', $newsItem['NewsItem']['id'])); ?> </li>
		<li><?php echo $html->link(sprintf(__('Delete %s', true), __('NewsItem', true)), array('action'=>'delete', $newsItem['NewsItem']['id']), array('class'=>'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $newsItem['NewsItem']['id'])); ?> </li>
		<li><?php echo $html->link(sprintf(__('List %s', true), __('NewsItems', true)), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(sprintf(__('New %s', true), __('NewsItem', true)), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(sprintf(__('List %s', true), __('SmallImages', true)), array('controller'=> 'small_images', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(sprintf(__('New %s', true), __('SmallImage', true)), array('controller'=> 'small_images', 'action'=>'add')); ?> </li>
	</ul>
</div>
