<?php 



loadController('Projects');



class ProjectsControllerTestCase extends CakeTestCase {

	var $TestObject = null;



	function setUp() {

		$this->TestObject = new ProjectsController();

	}



	function tearDown() {

		unset($this->TestObject);

	}



	/*

	function testMe() {

		$result = $this->TestObject->index();

		$expected = 1;

		$this->assertEqual($result, $expected);

	}

	*/

}

?>