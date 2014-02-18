<!-- test -->
<?php
/*
<script language="javascript">
var fadeimages = new Array();
<?php
    $i = 0;
    echo "\n";
    
    // Uses all the photos, with the first child specified first
    if($page_id != 'portfolio' || !isset($subpage_id))
    {
        echo 'fadeimages[0] = ["' . $html->url('/img/fade_images/' . $photo_list->photos[$photo_tree->children[$page_id]->photo_ids[0]]->path, true) . '", "", ""]' . "\n";
        
        $i = 1;
        foreach($photo_list->photos as $photo)
        {
            if($photo->id != $photo_tree->children[$page_id]->photo_ids[0])
            {
                echo 'fadeimages[' . $i . '] = ["' . $html->url('/img/fade_images/' .$photo->path, true) . '", "", ""]' . "\n";
                $i++;
            }
        }
    }
    else // fixed order for portfolio pages
    {
        foreach($photo_tree->children['portfolio']->children[$subpage_id]->photo_ids as $photo)
        {
            if(!isset($this_project) || $photo_list->photos[$photo]->project != $current_project) {
                $current_project = $photo_list->photos[$photo]->project; $this_project = $current_project;
            }
            else
                $this_project = '';
            
            echo 'fadeimages[' . $i . '] = ["' . $html->url($photo_list->photos[$photo]->path, true) . '", "' . $this_project .'", ""]' . "\n";
            $i++;
        }
    }
?>
</script>
 */
?>
<script type="text/javascript">
var fadeimages = new Array();
<?php
	// Special ordering for portfolio pages
	$i = 0;
	if($this->params['controller'] == 'portfolio' && isset($this->params['pass'])) {
		foreach($portfolio_items['Project'] as $project)
		{
			foreach($project['LargeImage'] as $photo)
			{
				echo 'fadeimages['.$i++.'] = ["'.$html->url('/img/large_images/'.$photo['url'], true).
					'", "", "", "'.$project['description'].'"]'."\n";
			}
		}
	}
	else
	{
		// The first image is picked separately
		echo 'fadeimages[0] = ["' . $html->url('/img/large_images/' . 
				$first_photo['url'], true) . '", "", ""]' . "\n";

		// Then show the rest of the images
		$i = 1;
		foreach($photos as $photo)
		{
				if($photo['LargeImage']['id'] != $first_photo['id'] && $photo['LargeImage']['includefade'] == 1)
				{
						echo 'fadeimages[' . $i . '] = ["' . $html->url('/img/large_images/' . 
								$photo['LargeImage']['url'], true) . '", "", ""]' . "\n";
						++$i;
				}
		}
	}
?>

var mygallery=new fadeSlideShow({
	wrapperid: "image-box", //ID of blank DIV on page to house Slideshow
	dimensions: [550, 375], //width/height of gallery in pixels. Should reflect dimensions of largest image
	imagearray: fadeimages,
	displaymode: {type:'auto', pause:6000, cycles:0, wraparound:false},
	persist: false, //remember last viewed slide and recall within same session?
	fadeduration: 500, //transition duration (milliseconds)
	togglerid: ""
})
</script>
