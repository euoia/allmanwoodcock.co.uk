<?php 



loadController('SmallImages');



class SmallImagesControllerTestCase extends CakeTestCase {

	var $TestObject = null;



	function setUp() {

		$this->TestObject = new SmallImagesController();

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