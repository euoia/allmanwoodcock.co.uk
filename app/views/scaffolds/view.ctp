<?php
/* SVN FILE: $Id: view.thtml 5317 2007-06-20 08:28:35Z phpnut $ */
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
 * @subpackage		cake.cake.libs.view.templates.scaffolds
 * @since			CakePHP(tm) v 0.10.0.1076
 * @version			$Revision: 5317 $
 * @modifiedby		$LastChangedBy: phpnut $
 * @lastmodified	$Date: 2007-06-20 03:28:35 -0500 (Wed, 20 Jun 2007) $
 * @license			http://www.opensource.org/licenses/mit-license.php The MIT License
 */
?>
<?php
$modelName = ucwords(Inflector::singularize($this->name));
$modelKey = Inflector::underscore($modelName);
$objModel =& ClassRegistry::getObject($modelKey);
if (is_null($this->plugin)) {
	$path = '/';
} else {
	$path = '/'.$this->plugin.'/';
}
if (!empty($objModel->alias)) {
	foreach ($objModel->alias as $key => $value) {
		$alias[] = $key;
	}
	$count = 0;
}?>
<h1>View
<?php echo Inflector::humanize($modelName)?>
</h1>
<dl>
<?php
foreach ($fieldNames as $field => $value) {
	echo "<dt>".$value['prompt']."</dt>";
	if (isset($value['foreignKey'])) {
		$otherModelObject =& ClassRegistry::getObject(Inflector::underscore($objModel->tableToModel[$value['table']]));
		$displayField = $otherModelObject->getDisplayField();
		$displayText = $data[$alias[$count]][$displayField];
		if (!empty($data[$objModel->tableToModel[$objModel->table]][$field]) && (isset($displayText))) {
			echo "<dd>".$html->link($displayText, $path.Inflector::underscore($value['controller']).'/view/'
							.$data[$objModel->tableToModel[$objModel->table]][$field] )."</dd>";
		} else {
			echo "<dd>&nbsp;</dd>";
		}
		$count++;
	} else {
		if ( !empty($data[$objModel->tableToModel[$objModel->table]][$field])) {
			echo "<dd>".$data[$objModel->tableToModel[$objModel->table]][$field]."</dd>";
		} else {
			echo "<dd>&nbsp;</dd>";
		}
	}
}?>
</dl>
<ul class='actions'>
<?php
echo "<li>".$html->link('Edit '.Inflector::humanize($objModel->name), $path.$this->viewPath.'/edit/'.$data[$objModel->tableToModel[$objModel->table]][$this->controller->{$modelName}->primaryKey])."</li>";
echo "<li>".$html->link('Delete  '.Inflector::humanize($objModel->name), $path.$this->viewPath.'/delete/'.$data[$objModel->tableToModel[$objModel->table]][$this->controller->{$modelName}->primaryKey], null, 'Are you sure you want to delete id '.$data[$objModel->tableToModel[$objModel->table]][$this->controller->{$modelName}->primaryKey].' ?')."</li>";
echo "<li>".$html->link('List  '.Inflector::humanize($objModel->name), $path.$this->viewPath.'/index')."</li>";
echo "<li>".$html->link('New  '.Inflector::humanize($objModel->name), $path.$this->viewPath.'/add')."</li>";

foreach ( $fieldNames as $field => $value ) {
	if ( isset( $value['foreignKey'] ) ) {
		echo "<li>".$html->link( "List ".Inflector::humanize($value['controller']), $path.Inflector::underscore($value['controller'])."/index/")."</li>";
	}
}?>
</ul>

<!--hasOne relationships -->
<?php
foreach ($objModel->hasOne as $association => $relation) {
	$model = $relation['className'];
	$otherModelName = $objModel->tableToModel[$objModel->{$model}->table];
	$controller = Inflector::pluralize($model);
	$new = true;
	echo "<div class='related'><H2>Related ".Inflector::humanize($association)."</H2>";
	echo "<dl>";
	if (isset($data[$association]) && is_array($data[$association])) {
		foreach ($data[$association] as $field => $value) {
			if (isset($value)) {
				echo "<dt>".Inflector::humanize($field)."</dt>";
				if (!empty($value)) {
					echo "<dd>".$value."</dd>";
				} else {
					echo "<dd>&nbsp;</dd>";
				}
				$new = null;
			}
		}
		echo "</dl>";
		if ($new == null) {
			echo "<ul class='actions'><li>".$html->link('Edit '.Inflector::humanize($association),$path.Inflector::underscore($controller)."/edit/{$data[$association][$objModel->{$model}->primaryKey]}")."</li></ul></div>";
		} else {
			echo "<ul class='actions'><li>".$html->link('New '.Inflector::humanize($association),$path.Inflector::underscore($controller)."/add/{$data[$association][$objModel->{$model}->primaryKey]}")."</li></ul></div>";
		}
	}
}
?>

<!-- HAS MANY AND HASANDBELONGSTOMANY -->
<?php
$relations = array_merge($objModel->hasMany, $objModel->hasAndBelongsToMany);
foreach ($relations as $association => $relation) {
	$model = $relation['className'];
	$count = 0;
	$otherModelName = Inflector::singularize($model);
	$controller = Inflector::pluralize($model);

	echo "<div class='related'><H2>Related ".Inflector::humanize(Inflector::pluralize($association))."</H2>";
	if (isset($data[$association][0]) && is_array($data[$association])) {?>
		<table class="inav" cellspacing="0">
			<tr>
<?php
		$bFound = false;
		foreach ($data[$association][0] as $column=>$value) {
			echo "<th>".Inflector::humanize($column)."</th>";
		}?>
				<th>Actions</th>
			</tr>
<?php
		foreach ($data[$association] as $row) {
			echo "<tr>";
			foreach ($row as $column=>$value) {
				echo "<td>".$value."</td>";
			}
			if (isset($this->controller->{$modelName}->{$association})) {?>
				<td class="listactions"><?php echo $html->link('View',$path.Inflector::underscore($controller).
																"/view/{$row[$this->controller->{$modelName}->{$association}->primaryKey]}/")?>
										<?php echo $html->link('Edit',$path.Inflector::underscore($controller).
																"/edit/{$row[$this->controller->{$modelName}->{$association}->primaryKey]}/")?>
										<?php echo $html->link('Delete',$path.Inflector::underscore($controller).
																"/delete/{$row[$this->controller->{$modelName}->{$association}->primaryKey]}/", null, 'Are you sure you want to delete id '.$row[$this->controller->{$modelName}->{$association}->primaryKey].' ?')?>
				</td>
<?php
			} else {?>
				<td class="listactions"><?php echo $html->link('View',$path.Inflector::underscore($controller).
																"/view/{$row[$this->controller->{$modelName}->primaryKey]}/")?>
										<?php echo $html->link('Edit',$path.Inflector::underscore($controller).
																"/edit/{$row[$this->controller->{$modelName}->primaryKey]}/")?>
										<?php echo $html->link('Delete',$path.Inflector::underscore($controller).
																"/delete/{$row[$this->controller->{$modelName}->primaryKey]}/", null, 'Are you sure you want to delete id '.$row[$this->controller->{$modelName}->primaryKey].' ?')?>
				</td>
<?php
			}
			echo "</tr>";
		}
	}?>
</table>
<ul class="actions">
<?php echo "<li>".$html->link('New '.Inflector::humanize($association),$path.Inflector::underscore($controller)."/add/")."</li>";?>
</ul></div>
<?php }?>