<?php
	require_once 'BaseNode_class.php';
	
	class AWPhoto
	{
		public $__this = array();
		
		function __construct($id, $path, $title, $project="") {
			$this->__this['id'] 				= $id;
			$this->__this['path']				= $path;
			$this->__this['title']			= $title;
			$this->__this['project'] 		= $project;
		}
		
		public function __get($n){
    	return $this->__this[$n];
  	}
  
	}
	
	class AWPhotoList
	{
		public $photos;
		public $optional_custom_dir;
		public $filetype;
			
		function add_photo($id, $newpath, $newtitle, $newproject="")
		{
			if(isset($this->photos[$id]))
				throw new exception("id already exists");
				
			$this->photos[$id] = new AWPhoto($id, $newpath . $this->filetype, $newtitle, $newproject);
		}

	}
	
	class AWNode extends BaseNode
	{
		// The page title
		public $title;
		
		// The photos associated with this node
		public $photo_ids = array();
		
		function add_photo($id)
		{
			$this->photo_ids[] = $id;
		}
		
		function add_photos($photo_array)
		{
			foreach ($photo_array as $photo_id)
			{
				$this->photo_ids[] = $photo_id;
			}
		}
	
			
	}
?>