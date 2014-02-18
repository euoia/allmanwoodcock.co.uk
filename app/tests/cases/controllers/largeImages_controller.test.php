<?php 



loadController('LargeImages');



class LargeImagesControllerTestCase extends CakeTestCase {

	var $TestObject = null;



	function setUp() {

		$this->TestObject = new LargeImagesController();

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