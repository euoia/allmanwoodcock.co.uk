<?php

class Service extends AppModel {



	var $name = 'Service';

	var $validate = array(

		'id' => 'numeric'

	);



	var $actsAs = array('Slug' => array(

		'overwrite' => true

	));



}

?>