<!-- Link Images -->
<div id="link-container">
<?php
$i = 1;
foreach($pages as $page) {
		if($page['Page']['name'] == 'services' && $page_name == 'services' && !empty($service_text))
			$on = 'servicetext-onpage';
		else if($page['Page']['name'] == $page_name)
				$on = 'onpage';
		else
				$on = '';

		$link_image = 'link' . $i;
		echo('<div class="link-box ' . $link_image .
				' ' . $on . '"></div>' . "\n");
		++$i;
}
?>
</div>

<!-- Transparent blue overlays -->
<div id="link-background">
<?php
foreach($pages as $page) {
		if($page['Page']['name'] == 'services' && $page_name == 'services' && !empty($service_text))
			echo('<div class="box onpage"></div>'. "\n");
		else
			echo('<div class="box"></div>'. "\n");
}
?>
</div>

<div>
<ul id="links">
<?php
foreach($pages as $page) {
		if($page['Page']['name'] == $page_name)
				$on = 'textlink-onpage';
		else
				$on = 'offpage';

		echo('<li class="' . $on . '">' . 
				$html->link(str_replace('_', ' ', $page['Page']['name']), '/' . $page['Page']['name']) .
				'</li>' ."\n");

}
?>
</ul>
</div>
