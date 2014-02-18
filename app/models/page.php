<?php
class Page extends AppModel {

	var $name = 'Page';
	var $validate = array(
		'id' => 'numeric',
		'title' => 'notEmpty',
		'has_children' => 'notEmpty',
	);

	var $belongsTo = array('SmallImage', 'LargeImage');

}
?>
