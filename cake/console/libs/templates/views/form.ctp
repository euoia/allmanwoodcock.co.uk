<?php
/* SVN FILE: $Id: form.ctp 5811 2007-10-20 06:39:14Z phpnut $ */
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework <http://www.cakephp.org/>
 * Copyright 2005-2007, Cake Software Foundation, Inc.
 *								1785 E. Sahara Avenue, Suite 490-204
 *								Las Vegas, Nevada 89104
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright		Copyright 2005-2007, Cake Software Foundation, Inc.
 * @link				http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package			cake
 * @subpackage		cake.cake.console.libs.templates.views
 * @since			CakePHP(tm) v 1.2.0.5234
 * @version			$Revision: 5811 $
 * @modifiedby		$LastChangedBy: phpnut $
 * @lastmodified	$Date: 2007-10-20 07:39:14 +0100 (Sat, 20 Oct 2007) $
 * @license			http://www.opensource.org/licenses/mit-license.php The MIT License
 */
?>
<div class="<?php echo $singularVar;?>">
<?php echo "<?php echo \$form->create('{$modelClass}');?>\n";?>
	<fieldset>
 		<legend><?php echo "<?php echo sprintf(__('".Inflector::humanize($action)." %s', true), __('{$singularHumanName}', true));?>";?></legend>
<?php
		echo "\t<?php\n";
		foreach ($fields as $field) {
			if ($action == 'add' && $field['name'] == $primaryKey) {
				continue;
			} elseif (!in_array($field['name'], array('created', 'modified', 'updated'))) {
				echo "\t\techo \$form->input('{$field['name']}');\n";
			}
		}
		foreach ($hasAndBelongsToMany as $assocName => $assocData) {
			echo "\t\t echo \$form->input('{$assocName}');\n";
		}
		echo "\t?>\n";
?>
	</fieldset>
<?php
	echo "<?php echo \$form->end('Submit');?>\n";
?>
</div>
<div class="actions">
	<ul>
<?php if ($action != 'add'):?>
		<li><?php echo "<?php echo \$html->link(__('Delete', true), array('action'=>'delete', \$form->value('{$modelClass}.{$primaryKey}')), null, sprintf(__('Are you sure you want to delete # %s?', true), \$form->value('{$modelClass}.{$primaryKey}'))); ?>";?></li>
<?php endif;?>
		<li><?php echo "<?php echo \$html->link(sprintf(__('List %s', true), __('{$pluralHumanName}', true)), array('action'=>'index'));?>";?></li>
<?php
		foreach ($foreignKeys as $field => $value) {
			$otherModelClass = $value['1'];
			if ($otherModelClass != $modelClass) {
				$otherModelKey = Inflector::underscore($otherModelClass);
				$otherControllerName = Inflector::pluralize($otherModelClass);
				$otherControllerPath = Inflector::underscore($otherControllerName);
				$otherSingularName = Inflector::variable($otherModelClass);
				$otherPluralHumanName = Inflector::humanize($otherControllerPath);
				$otherSingularHumanName = Inflector::humanize($otherModelKey);
				echo "\t\t<li><?php echo \$html->link(sprintf(__('List %s', true), __('{$otherPluralHumanName}', true)), array('controller'=> '{$otherControllerPath}', 'action'=>'index')); ?> </li>\n";
				echo "\t\t<li><?php echo \$html->link(sprintf(__('New %s', true), __('{$otherSingularHumanName}', true)), array('controller'=> '{$otherControllerPath}', 'action'=>'add')); ?> </li>\n";
			}
		}
?>
	</ul>
</div>
