<?php
	require_once 'get_ancestors_func.php';
	
	class BaseNode
	{
		// The identifier for the node
		public $id;
		
		// my parent node, if I have one
		public $parent;
		
		// array containg references to my children
		public $children = array();
		
		function __construct($newid, $optional_parent="") {
			if(!$newid)
				throw new exception("No ID supplied in Node class constructor");
			
			if($optional_parent)
				$this->parent = $optional_parent;
				
			$this->id = $newid;
			$this->parent = $optional_parent;
		}
		
		function add_child($child)
		{
			if(!in_array(get_class($this), get_ancestors($child)))
				throw new exception('Tried to add_child of invalid class.');

			$this->children[$child->id] = $child;
				
		}
			
			
		function new_child($new_child_id) {
			if(!$new_child_id)
				throw new exception("No ID supplied");
				
			if(isset($this->children[$new_child_id]))
				throw new exception("ID already exists");
			
			$type = get_class($this);
			return $this->children[$new_child_id] = new $type ($new_child_id, $this->id);
		}
		
		function new_children($new_children_ids) {
			if(!$new_children_ids)
				throw new exception("No IDs supplied");
			
			foreach($new_children_ids as $child)
				$this->new_child($child);
		}
		
			
	}
?>