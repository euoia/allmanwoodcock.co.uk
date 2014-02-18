<?php echo $text['Page']['text']; 

	function cmp_func($a, $b) {
		return strcmp($a['Client']['id'], $b['Client']['id']);
	}
	
	$template 			= '<li>_TITLE</li>';
	$link_template 	= '<li><a alt="Go to the \'_TITLE\' website" title="Go to the \'_TITLE\' website" href="_LINK">_TITLE</a></li>';
	
	usort($clients, "cmp_func");
	
?>

<ul>
<?php
foreach($clients as $client) {
	//	var_dump($client);
		if(strlen($client['Client']['link']))
		{
			$output = $link_template;
			$output = str_replace('_LINK', $client['Client']['link'], $output);
		}
		else
			$output = $template;
			
		$output = str_replace('_TITLE', $client['Client']['id'], $output) . "\n";
		

		echo $output;
	}
?>
</ul>