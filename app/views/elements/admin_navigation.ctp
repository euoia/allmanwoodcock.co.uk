<div id="admin-content">
	<?php echo $html->image('logo.gif'); ?>
	<div id="pageTitleBox">
		<span class="pageTitle"><?php echo __($this->name, true)?></span>
	</div>

	<div id="logged-in">Logged in as <?=$user?> [<?=$html->link('Log out', '/admin/users/logout')?>]</div>
	<?=$html->link(__('top level pages', true), '/admin/pages'); ?> | 
	<?=$html->link(__('clients', true), '/admin/clients'); ?> | 
	<?=$html->link(__('services', true), '/admin/services'); ?> | 
	<?=$html->link(__('portfolio', true), '/admin/portfolios'); ?> |<br />
	<?=$html->link(__('news', true), '/admin/newsItems'); ?> | 
	<?=$html->link(__('small images', true), '/admin/smallImages') ?> |
	<?=$html->link(__('large images', true), '/admin/largeImages') ?> |
	<?=$html->link(__('projects', true), '/admin/projects') ?> |
	<?=$html->link(__('users', true), '/admin/users') ?> |
	<?=$html->link(__('log', true), '/admin/log') ?> |
</div>
