<?php

class LargeImage extends AppModel {



	var $name = 'LargeImage';

	var $validate = array(

		'id' => 'numeric',

		'url' => 'notEmpty',

	);



	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array('Project');

	var $hasMany = array('Page');



}

?>