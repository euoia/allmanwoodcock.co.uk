<?php 



loadModel('SmallImage');



class SmallImageTestCase extends CakeTestCase {

	var $TestObject = null;



	function setUp() {

		$this->TestObject = new SmallImage();

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