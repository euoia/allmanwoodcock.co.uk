<?
	foreach($portfolio as $p)
	{
		echo '<p>' . $html->link($p['Portfolio']['title'], '/portfolio/' . 
				$p['Portfolio']['slug']) . '</p>';
	}
?>
