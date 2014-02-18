<?php
	require_once 'AWNode.php';
	require_once 'populate_photo_list_func.php';
	require_once 'class.krumo.php';
	
	$photo_list = populate_photo_list();
	//krumo($photo_list);
	

	
/*
	$root->new_child('profile');
	$root->children['profile']->add_photos( 
		array("hobart_school_02", "dereham_library_02", "new_yacht_station_01", "gt_ellingham_school_05", "cedar_house_01", "cawston_park_03") );
		
		
	$root->new_child('clients');
	$root->new_child('services');
	$root->new_child('portfolio');
	$root->new_child('news');
	*/
	$root = new AWNode('root');
	$root = populate_photo_tree($root);
	//krumo($root);
	
	foreach($root->children as $child)
	{
		echo '<h1>' . $child->id . '</h1>';
		foreach($child->photo_ids as $photo_id)
		{
			echo '<div style="border: 1px solid black; background-color: #FFFFC6; width: 300px; padding-bottom: 10px; margin-bottom: 20px; text-align: center;">';
			echo '<h2>' . $photo_list->photos[$photo_id]->title . '</h2>';
			echo '<img width="200" height="200" src="../no_upload/fade_images/' . $photo_list->photos[$photo_id]->path . '"><br>';
			echo '</div>';
		}
		
		foreach($child->children as $grandchild)
		{
			echo '<h1>' . $child->id . "->" . $grandchild->id . '</h1>';
			foreach($grandchild->photo_ids as $photo_id)
			{
				echo '<div style="border: 1px solid black; background-color: #FFFFC6; width: 300px; padding-bottom: 10px; margin-bottom: 20px; text-align: center;">';
				echo '<h2>' . $photo_list->photos[$photo_id]->title . '</h2>';
				echo '<img width="200" height="200" src="../no_upload/fade_images/' . $photo_list->photos[$photo_id]->path . '"><br>';
				echo '</div>';
			}
		}
		
	}
/*
	echo sizeof($root->children['profile']->photos);
	foreach($root->children['profile']->photos as $photo)
	{
		krumo($photo_list->photos[$photo]);
	}*/
?>