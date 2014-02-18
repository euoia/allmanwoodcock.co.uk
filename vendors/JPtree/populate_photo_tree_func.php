<?php
	require_once 'AWNode.php';
		

	function populate_photo_tree($root)
	{
		$root->new_child('profile')->add_photos(
			array("cedar_house_08", "hobart_school_02", "dereham_library_02", "new_yacht_station_01", "gt_ellingham_school_05", "cedar_house_01", "cawston_park_03") );
			
		$root->new_child('clients')->add_photos(
			array("cawston_park_03", "riverside_heights_01", "prince_of_wales_road_01", "new_yacht_station_03", "george_street_04", "cawston_park_02", "hobart_school_03") );
		
		$root->new_child('services')->add_photos(
			array("hobart_school_02", "dereham_library_02", "poringland_library_02", "cawston_park_05", "gt_ellingham_school_05", "aw_01", "cedar_house_05") );
		
		$root->new_child('portfolio')->add_photos(
			array("prince_of_wales_road_03", "thurlton_primary_01", "thurlton_primary_05", "riverside_heights_02", "george_street_01", "costessey_primary_school_01") );
			
		$root->new_child('news')->add_photos(
			array("hobart_school_04", "hobart_school_05", "prince_of_wales_road_01", "new_yacht_station_01", "thurlton_primary_02", "cedar_house_08") );
			
		$root->new_child('contact')->add_photos(
			array("cedar_house_05", "cawston_park_03", "costessey_primary_school_02", "riverside_heights_01", "new_yacht_station_01", "hobart_school_01") );
			
		
		// Portfolio
		
		$root->children['portfolio']->new_child('conservation-and-restoration')->add_photos(
			array( "prince_of_wales_road_03", "prince_of_wales_road_01", "prince_of_wales_road_02", "spyridon_church_01", "spyridon_church_04", "spyridon_church_03") );
			
		$root->children['portfolio']->new_child('education')->add_photos(
			array("hobart_school_01", "hobart_school_02", "hobart_school_03", "hobart_school_04", "thurlton_primary_01", "thurlton_primary_02", "thurlton_primary_03", "thurlton_primary_04", "gt_ellingham_school_04", "gt_ellingham_school_01", "gt_ellingham_school_03", "gt_ellingham_school_02") );
			
		$root->children['portfolio']->new_child('health')->add_photos(
			array("cawston_park_01", "cawston_park_02", "cawston_park_03", "cawston_park_05") );
			
		$root->children['portfolio']->new_child('leisure-and-retail')->add_photos(
			array("new_yacht_station_01", "new_yacht_station_05", "new_yacht_station_03", "new_yacht_station_02", "new_yacht_station_04") );
		
		$root->children['portfolio']->new_child('residential')->add_photos(
			array("riverside_heights_03", "riverside_heights_04", "riverside_heights_02", "riverside_heights_01", "george_street_01", "george_street_02", "george_street_04", "george_street_03", "cedar_house_02", "cedar_house_07", "cedar_house_09", "cedar_house_03", "cedar_house_05", "cedar_house_06" ) );
			
		$root->children['portfolio']->new_child('social-and-community')->add_photos(
			array("dereham_library_02", "dereham_library_03", "poringland_library_01", "poringland_library_02", "wymondham_library_02", "wymondham_library_01") );
			
		$root->children['portfolio']->new_child('sustainable-development')->add_photos(
			array("thurlton_primary_01", "thurlton_primary_02", "thurlton_primary_03", "thurlton_primary_04", "cawston_park_02", "cawston_park_03", "cedar_house_02", "cawston_park_05", "cawston_park_01", "cedar_house_07", "cedar_house_09", "cedar_house_03", "cedar_house_05", "cedar_house_06" ) );
			
			
			
		return $root;
	}
?>