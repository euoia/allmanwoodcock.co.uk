<?php
/* SVN FILE: $Id: schema.php 5875 2007-10-23 00:25:51Z phpnut $ */
/**
 * Schema database management for CakePHP.
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
 * @subpackage		cake.cake.libs
 * @since			CakePHP(tm) v 1.2.0.5550
 * @version			$Revision: 5875 $
 * @modifiedby		$LastChangedBy: phpnut $
 * @lastmodified	$Date: 2007-10-23 01:25:51 +0100 (Tue, 23 Oct 2007) $
 * @license			http://www.opensource.org/licenses/mit-license.php The MIT License
 */
if (!class_exists('connectionmanager')) {
	uses('model' . DS . 'connection_manager');
}
/**
 * Base Class for Schema management
 *
 * @package		cake.libs
 * @subpackage	cake.libs
 */
class CakeSchema extends Object {
/**
 * name of the App Schema
 *
 * @var string
 * @access public
 */
	var $name = null;
/**
 * path to write location
 *
 * @var string
 * @access public
 */
	var $path = TMP;
/**
 * connection used for read
 *
 * @var string
 * @access public
 */
	var $connection = 'default';
/**
 * array of tables
 *
 * @var array
 * @access public
 */
	var $tables = array();
/**
 * Constructor
 *
 * @param array $data optional load object properties
 * @access private
 */
	function __construct($data = array()) {
		$this->path = CONFIGS . 'sql';
		$data = am(get_object_vars($this), $data);

		$this->_build($data);

		if (empty($this->name)) {
			$this->name = preg_replace('/schema$/i', '', get_class($this));
		}
		parent::__construct();
	}
/**
 * Builds schema object properties
 *
 * @param array $data loaded object properties
 * @access protected
 */
	function _build($data) {
		foreach ($data as $key => $val) {
			if (!in_array($key, array('name', 'path', 'connection', 'tables', '_log'))) {
				$this->tables[$key] = $val;
				unset($this->{$key});
			} elseif ($key != 'tables' && !empty($val)) {
				$this->{$key} = $val;
			}
		}
	}
/**
 * before callback to be implemented in subclasses
 *
 * @param array $events schema object properties
 * @access public
 * @return bool
 */
	function before($event = array()) {
		return true;
	}
/**
 * after callback to be implemented in subclasses
 *
 * @param array $events schema object properties
 * @access public
 */
	function after($event = array()) {
	}
/**
 * Reads database and creates schema tables
 *
 * @param array $options schema object properties
 * @access public
 * @return array $name, $tables
 */
	function load($options = array()) {
		if (is_string($options)) {
			$options = array('path'=> $options);
		}
		if (!isset($options['name'])) {
			$options['name'] = Inflector::camelize(Configure::read('App.dir'));
		}
		$options = am(
			get_object_vars($this), $options
		);
		extract($options);
		if (file_exists($path . DS . 'schema.php')) {
			require_once($path . DS . 'schema.php');
			$class =  $name .'Schema';
			if(class_exists($class)) {
				$Schema =& new $class();
				$this->_build($options);
				return $Schema;
			}
		}
		return false;
	}
/**
 * Reads database and creates schema tables
 *
 * @param array $options schema object properties
 * @access public
 * @return array $name, $tables
 */
	function read($options = array()) {
		extract(am(
			array(
				'connection' => $this->connection,
				'name' => Inflector::camelize(Configure::read('App.dir')),
			),
			$options
		));
		$db =& ConnectionManager::getDataSource($connection);
		$currentTables = array_flip($db->sources());
		$prefix = null;
		if(isset($db->config['prefix'])) {
			$prefix = $db->config['prefix'];
		}
		if (empty($models)) {
			$models = Configure::listObjects('model');
		}
		loadModel(null);
		$tables = array();
		foreach ($models as $model) {
			if($model == 'ArosAco') {
				$model = 'Permission';
			}
			if (!class_exists(low($model))) {
				if(!class_exists(low('AclNode')) && in_array($model, array('Aro','Aco', 'Permission'))) {
					uses('model' . DS . 'db_acl');
				} else {
					loadModel($model);
				}
			}
			if(class_exists(low($model))) {
				$Object =& new $model();
				$Object->setDataSource($connection);
				$table = $db->fullTableName($Object, false);
				if (is_object($Object)) {
					$table = $db->fullTableName($Object, false);
					if(isset($currentTables[$table])) {
						if(empty($tables[$Object->table])) {
							$tables[$Object->table] = $this->__columns($Object);
							$tables[$Object->table]['indexes'] = $db->index($Object);
							unset($currentTables[$table]);
						}
						if(!empty($Object->hasAndBelongsToMany)) {
							foreach($Object->hasAndBelongsToMany as $Assoc => $assocData) {
								if (isset($assocData['with'])) {
									$class = $assocData['with'];
								} elseif ($assocData['_with']) {
									$class = $assocData['_with'];
								}
								if (is_object($Object->$class)) {
									$table = $db->fullTableName($Object->$class, false);
									if(isset($currentTables[$table])) {
										$tables[$Object->$class->table] = $this->__columns($Object->$class);
										$tables[$Object->$class->table]['indexes'] = $db->index($Object->$class);
										unset($currentTables[$table]);
									}
								}
							}
						}
					}
				}
			}
		}

		if(!empty($currentTables)) {
			foreach(array_flip($currentTables) as $table) {
				if($prefix) {
					$table = str_replace($prefix, '', $table);
				}
				$Object = new AppModel(array('name'=> Inflector::classify($table), 'table'=> $table, 'ds'=> $connection));
				$tables['missing'][$table] = $this->__columns($Object);
				$tables['missing'][$table]['indexes'] = $db->index($Object);
			}
		}

		ksort($tables);
		return compact('name', 'tables');
	}
/**
 * Writes schema file from object or options
 *
 * @param mixed $object schema object or options array
 * @param array $options schema object properties to override object
 * @access public
 * @return mixed false or string written to file
 */
	function write($object, $options = array()) {
		if (is_object($object)) {
			$object = get_object_vars($object);
			$this->_build($object);
		}

		if (is_array($object)) {
			$options = $object;
			unset($object);
		}

		extract(am(
			get_object_vars($this), $options
		));

		$out = "\n\nclass {$name}Schema extends CakeSchema {\n\n";

		$out .= "\tvar \$name = '{$name}';\n\n";

		if ($path !== $this->path) {
			$out .= "\tvar \$path = '{$path}';\n\n";
		}

		if ($connection !== 'default') {
			$out .= "\tvar \$connection = '{$connection}';\n\n";
		}

		$out .= "\tfunction before(\$event = array()) {\n\t\treturn true;\n\t}\n\n\tfunction after(\$event = array()) {\n\t}\n\n";

		if(empty($tables)) {
			$this->read();
		}

		foreach ($tables as $table => $fields) {
			if(!is_numeric($table) && $table !== 'missing') {
				$out .= "\tvar \${$table} = array(\n";
				if (is_array($fields)) {
					$cols = array();
					foreach ($fields as $field => $value) {
						if($field != 'indexes') {
							if (is_string($value)) {
								$type = $value;
								$value = array('type'=> $type);
							}
							$col = "\t\t\t'{$field}' => array('type'=>'" . $value['type'] . "', ";
							unset($value['type']);
							$col .= join(', ',  $this->__values($value));
						} else {
							$col = "\t\t\t'indexes' => array(";
							$props = array();
							foreach ($value as $key => $index) {
								$props[] = "'{$key}' => array(".join(', ',  $this->__values($index)).")";
							}
							$col .= join(', ', $props);
						}
						$col .= ")";
						$cols[] = $col;
					}
					$out .= join(",\n", $cols);
				}
				$out .= "\n\t\t);\n";
				$out .="\n";
			}
		}
		$out .="\n}\n\n";

		$File =& new File($path . DS . 'schema.php', true);
		$content = "<?php \n/*<!--". $name ." schema generated on: " . date('Y-m-d H:m:s') . " : ". time() . "-->*/\n{$out}?>";
		if ($File->write($content)) {
			return $content;
		}
		return false;
	}
/**
 * Writes schema file from object or options
 *
 * @param mixed $old schema object or array
 * @param mixed $new schema object or array
 * @access public
 * @return array $add, $drop, $change
 */
	function compare($old, $new = null) {
		if (empty($new)) {
			$new = $this;
		}
		if (is_array($new)) {
			if (isset($new['tables'])) {
				$new = $new['tables'];
			}
		} else {
			$new = $new->tables;
		}

		if (is_array($old)) {
			if (isset($old['tables'])) {
				$old = $old['tables'];
			}
		} else {
			$old = $old->tables;
		}
		$tables = array();
		foreach ($new as $table => $fields) {
			if($table == 'missing') {
				break;
			}
			if (!array_key_exists($table, $old)) {
				$tables[$table]['add'] = $fields;
			} else {
				$diff = array_diff_assoc($fields, $old[$table]);
				if (!empty($diff)) {
					$tables[$table]['add'] = $diff;
				}
				$diff = array_diff_assoc($old[$table], $fields);
				if (!empty($diff)) {
					$tables[$table]['drop']  = $diff;
				}
			}
			foreach ($fields as $field => $value) {
				if (isset($old[$table][$field])) {
					$diff = array_diff_assoc($value, $old[$table][$field]);
					if (!empty($diff)) {
						$tables[$table]['change'][$field] = am($old[$table][$field], $diff);
					}
				}

				if (isset($add[$table][$field])) {
					$wrapper = array_keys($fields);
					if ($column = array_search($field, $wrapper)) {
						if (isset($wrapper[$column - 1])) {
							$tables[$table]['add'][$field]['after'] = $wrapper[$column - 1];
						}
					}
				}
			}
		}
		return $tables;
	}
/**
 * Formats Schema columns from Model Object
 *
 * @param array $value options keys(type, null, default, key, length, extra)
 * @access public
 * @return array $name, $tables
 */
	function __values($values) {
		$vals = array();
		if(is_array($values)) {
			foreach ($values as $key => $val) {
				if(is_array($val)) {
					$vals[] = "'{$key}' => array('".join("', '",  $val)."')";
				} else if (!is_numeric($key)) {
					$prop = "'{$key}' => ";
					if (is_bool($val)) {
						$prop .= $val ? 'true' : 'false';
					} elseif (is_numeric($val)) {
						$prop .= $val;
					} elseif ($val === null) {
						$prop .= 'null';
					} else {
						$prop .= "'{$val}'";
					}
					$vals[] = $prop;
				}
			}
		}
		return $vals;
	}
/**
 * Formats Schema columns from Model Object
 *
 * @param array $Obj model object
 * @access public
 * @return array $name, $tables
 */
	function __columns(&$Obj) {
		$db =& ConnectionManager::getDataSource($Obj->useDbConfig);
		$fields = $Obj->schema(true);
		//pr($fields);
		$columns = $props = array();
		foreach ($fields->value as $name => $value) {

			if ($Obj->primaryKey == $name) {
				$value['key'] = 'primary';
			}
			if (!isset($db->columns[$value['type']])) {
				trigger_error('Schema generation error: invalid column type ' . $value['type'] . ' does not exist in DBO', E_USER_WARNING);
				continue;
			} else {
				$defaultCol = $db->columns[$value['type']];
				if (isset($defaultCol['limit']) && $defaultCol['limit'] == $value['length']) {
					unset($value['length']);
				} elseif (isset($defaultCol['length']) && $defaultCol['length'] == $value['length']) {
					unset($value['length']);
				}
				unset($value['limit']);
			}

			if (isset($value['default']) && $value['default'] != 0) {
				unset($value['default']);
			}
			if (empty($value['length'])) {
				unset($value['length']);
			}
			if (empty($value['key'])) {
				unset($value['key']);
			}
			if (empty($value['extra'])) {
				unset($value['extra']);
			}
			$columns[$name] = $value;
		}

		return $columns;
	}
}
?>