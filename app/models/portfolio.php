<?php

class Portfolio extends AppModel {



	var $name = 'Portfolio';

	var $validate = array(

		'id' => 'numeric',

		'title' => 'notEmpty',

	);



	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasAndBelongsToMany = array(

			'Project' => array('className' => 'Project',

						'joinTable' => 'portfolios_projects',

						'foreignKey' => 'portfolio_id',

						'associationForeignKey' => 'project_id',

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



	var $actsAs = array('Slug' => array(

		'overwrite' => true

	));

}

?>