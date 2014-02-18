<?php

class Project extends AppModel {



	var $name = 'Project';

	var $validate = array(

		'id' => 'numeric'

	);



	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(

			'LargeImage' => array('className' => 'LargeImage',

								'foreignKey' => 'project_id',

								'conditions' => '',

								'fields' => '',

								'order' => '',

								'limit' => '',

								'offset' => '',

								'dependent' => '',

								'exclusive' => '',

								'finderQuery' => '',

								'counterQuery' => ''),

	);



	var $hasAndBelongsToMany = array(

			'Portfolio' => array('className' => 'Portfolio',

						'joinTable' => 'portfolios_projects',

						'foreignKey' => 'project_id',

						'associationForeignKey' => 'portfolio_id',

						'conditions' => '',

						'fields' => '',

						'order' => '',

						'limit' => '',

						'offset' => '',

						'unique' => '',

						'finderQuery' => '',

						'deleteQuery' => '',

						'insertQuery' => ''),

	);



}

?>