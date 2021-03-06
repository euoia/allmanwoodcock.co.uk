<?php
/* SVN FILE: $Id: lib_controller.group.php 4451 2007-02-05 05:32:30Z phpnut $ */
/**
 * Short description for file.
 *
 * Long description for file
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) Tests <https://trac.cakephp.org/wiki/Developement/TestSuite>
 * Copyright 2005-2007, Cake Software Foundation, Inc.
 *								1785 E. Sahara Avenue, Suite 490-204
 *								Las Vegas, Nevada 89104
 *
 *  Licensed under The Open Group Test Suite License
 *  Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright		Copyright 2005-2007, Cake Software Foundation, Inc.
 * @link				https://trac.cakephp.org/wiki/Developement/TestSuite CakePHP(tm) Tests
 * @package			cake.tests
 * @subpackage		cake.tests.groups
 * @since			CakePHP(tm) v 1.2.0.4206
 * @version			$Revision: 4451 $
 * @modifiedby		$LastChangedBy: phpnut $
 * @lastmodified	$Date: 2007-02-05 05:32:30 +0000 (Mon, 05 Feb 2007) $
 * @license			http://www.opensource.org/licenses/opengroup.php The Open Group Test Suite License
 */
/**
 * Short description for class.
 *
 * @package		cake.tests
 * @subpackage	cake.tests.groups
 */
class LibControllerGroupTest extends GroupTest {
	var $label = 'All cake/libs/controller/* (Not yet implemented)';

	function LibControllerGroupTest() {
		TestManager::addTestCasesFromDirectory($this, CORE_TEST_CASES . DS . 'libs' . DS . 'controller');
	}
}
?>