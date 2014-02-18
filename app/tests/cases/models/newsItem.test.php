<?php 



loadModel('NewsItem');



class NewsItemTestCase extends CakeTestCase {

	var $TestObject = null;



	function setUp() {

		$this->TestObject = new NewsItem();

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