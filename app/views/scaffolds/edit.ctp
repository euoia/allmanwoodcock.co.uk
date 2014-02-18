<?php
/* SVN FILE: $Id: edit.thtml 5317 2007-06-20 08:28:35Z phpnut $ */
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
$modelName = ucwords(Inflector::singularize($this->name));
$modelKey = $modelName;
if (is_null($this->plugin)) {
	$path = '/';
} else {
	$path = '/'.$this->plugin.'/';
}?>
<h1><?php echo $type.' '.Inflector::humanize($modelName);?></h1>
<?php
if ($type == 'Edit') {
	echo $html->formTag($path . Inflector::underscore($this->name) .'/update');
} else {
	echo $html->formTag($path. Inflector::underscore($this->name).'/create');
}
echo $form->generateFields( $fieldNames );
echo $form->generateSubmitDiv( 'Save' ); ?>
</form>
<ul class='actions'>
<?php
if ($type == 'Edit') {
	echo "<li>".$html->link('Delete  '.Inflector::humanize($modelName), $path.$this->viewPath.'/delete/'.$data[$modelKey][$this->controller->{$modelName}->primaryKey])."</li>";
}
echo "<li>".$html->link('List  '.Inflector::humanize($modelName), $path.$this->viewPath.'/index')."</li>";
if ($type == 'Edit') {
	foreach ($fieldNames as $field => $value) {
		if (isset($value['foreignKey'])) {
			echo "<li>".$html->link( "View ".Inflector::humanize($value['controller']), $path.Inflector::underscore($value['controller'])."/view/".$data[$modelKey][$field] )."</li>";
		}
	}
}?>
</ul>