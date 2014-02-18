<style type="text/css">
	#head {
		width: 550px;
		height: 75px;
		background-image: url(<?php echo $html->url('/img/head-background.jpg')?>);
	}

	#image-box {
		width: 550px;
		height: 375px;
		background: #CECEFF url(<?php echo $html->url('/img/fade-background.gif')?>);
		position:relative;
		z-index: 0;
		margin:0; padding: 0;
	}

	<?php
		$i = 1;
		foreach($pages as $page) {
			echo '.link' . $i . '{background-image: url(' .
				$html->url('/img/small_images/' . $page['SmallImage']['url'], true) . ')}' . "\n";
			++$i;
		}
	?>
</style>
