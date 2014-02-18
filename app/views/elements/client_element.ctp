<?php	
$template 			= '<li>_TITLE</li>';
$link_template 	= '<li><a alt="Go to the \'_TITLE\' website" title="Go to the \'_TITLE\' website" href="_LINK">_TITLE</a></li>';
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

	$output = str_replace('_TITLE', $client['Client']['name'], $output) . "\n";


	echo $output;
}
?>
</ul>
