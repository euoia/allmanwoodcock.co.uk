<?php

class User extends AppModel {



	var $name = 'User';

	var $validate = array(

		'id' => 'numeric',

		'username' => array(

									'.+',

									'rule' => array('maxlength', 40),

									'rule' => array('minlength', 2),

									'message' => 'Username must be between 2 and 40 characters.'

									),	

		'password' => array(

									'.+',

									'rule' => array('maxlength', 40),

									'rule' => array('minlength', 6),

									'message' => 'Password must be between 6 and 40 characters.'

									)

	);



}

?>