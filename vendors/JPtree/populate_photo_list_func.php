<?php
	require_once 'AWNode.php';
	
	// configuration
	$photo_filetype = '.jpg';
		
	function title_to_filename($title)
	{
		$title = str_replace(" ", "_", $title);
		return $title;
	}
	
	function title_to_id($title)
	{
		$title = strtolower($title);
		$title = str_replace(" ", "_", $title);
		return $title;
	}
	
	function add_set($photo_list, $start_id, $end_id, $set_name, $project_name="")
	{
		
		if($project_name=="") $project_name = $set_name;

		for($i=$start_id; $i<=$end_id; $i++)
		{
			$photo_list->add_photo(title_to_id($set_name) . '_' . sprintf("%02d", $i), title_to_filename($set_name) . '_' . sprintf("%02d", $i), $set_name . " $i", $project_name);
		}
	}
			
	function populate_photo_list()
	{
		$photo_list = new AWPhotoList;
		
		// configuration
		$photo_list->optional_custom_dir = "fade_images";
		$photo_list->filetype = '.jpg';
		
		add_set($photo_list, 1, 5, 'Cawston Park', 'Cawston Park Psychiatric Intensive Care Unit, Norfolk');
		add_set($photo_list, 1, 9, 'Cedar House', 'Eco-House, Norwich');
		add_set($photo_list, 1, 2, 'Costessey Primary School');
		add_set($photo_list, 2, 3, 'Dereham Library');
		add_set($photo_list, 1, 4, 'George Street', 'George Street, Great Yarmouth');
		add_set($photo_list, 1, 5, 'Gt Ellingham School', 'Great Ellingham School, Attleborough');
		add_set($photo_list, 1, 5, 'Hobart School', 'Hobart High School, Norfolk');
		add_set($photo_list, 1, 2, 'New Yacht Feasibility');
		add_set($photo_list, 1, 5, 'New Yacht Station', 'New Yacht Station, Norwich');
		add_set($photo_list, 1, 2, 'Poringland Library');
		add_set($photo_list, 1, 3, 'Prince Of Wales Road', '44 – 46 Prince of Wales Road, Norwich');
		add_set($photo_list, 1, 4, 'Riverside Heights', ' Riverside Heights, Norwich');
		add_set($photo_list, 1, 4, 'Spyridon Church', 'St Spyridon’s Greek Orthodox Church, Great Yarmouth');
		add_set($photo_list, 1, 5, 'Thurlton Primary', 'Thurlton Primary School, Norfolk');
		add_set($photo_list, 1, 2, 'Wymondham Library');
		add_set($photo_list, 1, 1, 'AW', 'Allman Woodcock Office');
		
		return $photo_list;
	}
?>