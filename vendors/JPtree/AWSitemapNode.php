<?php
	require_once 'BaseNode_class.php';
	
	class AWSiteNode extends BaseNode
	{
		// The page title
		public $title;
		
		// The page text
		public $text;
		
		// true or false, whether the page is allowed children
		public $has_children;
		
		function __construct($new_id, $has_children, $title='', $text='', $optional_parent='') {
			parent::__construct($new_id, $optional_parent);
			$this->has_children = $has_children;
			$this->title = $title;
			$this->text = $text;
		}
		
		function set($title, $text)
		{
			$this->title = $title;
			$this->text = $text;
		}
		
		function new_child($new_child_id) {
			if(!$this->has_children)
				throw new exception('Tried to add a child to a class with $has_children set to false.');
			
			parent::new_child($new_child_id);
		}
		
		function add_child($child) {
			if(!$this->has_children)
				throw new exception('Tried to add a child to a class with $has_children set to false.');
			
			parent::add_child($child);
		}
	}
?>