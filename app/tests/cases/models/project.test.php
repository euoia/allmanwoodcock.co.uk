<?php 



loadModel('Project');



class ProjectTestCase extends CakeTestCase {

	var $TestObject = null;



	function setUp() {

		$this->TestObject = new Project();

	}



	function tearDown() {

		unset($this->TestObject);

	}



	/*

	function testMe() {

		$result = $this->TestObject->findAll();

		$expected = 1;

		$this->assertEqual($result, $expected);

	}

	*/

}

?>