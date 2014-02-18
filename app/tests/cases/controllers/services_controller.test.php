<?php 



loadController('Services');



class ServicesControllerTestCase extends CakeTestCase {

	var $TestObject = null;



	function setUp() {

		$this->TestObject = new ServicesController();

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