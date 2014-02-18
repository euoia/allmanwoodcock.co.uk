<?php		
	function service_encode($service)
	{
		$service = str_replace("'", "", $service);
		$service = str_replace(" ", "-", $service);
		$service = str_replace("/", "and", $service);
		$service = strtolower($service);
		
		return $service;
	}
?>

<ul class="service-list">
	<?php 
	
	$template 					= '<b>_TITLE</b>';
	$link_template 			= '<a alt="Learn more about our \'_TITLE\' service" title="Learn more about our \'_TITLE\' service" href="_LINK">_TITLE</a>';
	$listitem_template 	=	'<li>_LI</li>'; 
	
	// wrap at x $wrapsize characters
	$wrapsize = 45;
		
	foreach($services as $i => $service)
	{	
		$title 	= $service['Service']['title'];
		//$link 	= $site_address . $directory['services'] . service_encode($title) . $page_ext;
		$service_id = $service['Service']['slug'];
		$link		= $html->url('/services/' . $service_id);
		
		
		if(strlen($title) > $wrapsize)
			$title = wordwrap($title, $wrapsize, '<br>');
			
		// not current page, link it
		if(!isset($subpage_id) || $subpage_id != $service_id)
		{
			$output = $link_template;
			$output = str_replace('_LINK', $link, $output);
		}
		else // current page
			$output = $template;
			
		$output = str_replace('_TITLE', $title, $output);
		$output = str_replace('_LI', $output, $listitem_template);

		echo $output . "\n";
	}
?>
</ul>
