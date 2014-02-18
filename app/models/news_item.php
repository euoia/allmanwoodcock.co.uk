<?php

class NewsItem extends AppModel {



	var $name = 'NewsItem';

	var $validate = array(

		'id' => 'numeric',

		'text' => 'notEmpty',

	);



	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(

			'SmallImage' => array('className' => 'SmallImage',

								'foreignKey' => 'small_image_id',

								'conditions' => '',

								'fields' => '',

								'order' => '',

								'counterCache' => ''),

	);



}

?>