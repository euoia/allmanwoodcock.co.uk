<div id="newsbox">
	<?php
		foreach($news as $newsItem) :
			$date = $time->toUnix($newsItem['NewsItem']['date_presented']);
			if($time->isToday($date))
				$date = 'Today';
			elseif($time->wasYesterday($date))
				$date = 'Yesterday';
			elseif($time->isThisYear($date))
				$date = date('l jS F', $date);
			else
				$date = date('l jS F Y', $date);
	?>
		<div class="newsitem">
			<div class="newsimage"><?php echo $html->image(Configure::read('small_image_dir') . DS . $newsItem['SmallImage']['url']);?></div>
			<div class="newstext">
				<span class="headline"><?php echo $date?></span>
				<?php echo $newsItem['NewsItem']['text'] ?>
			</div>
		</div>
	<?php
		endforeach;
	?>

	<div id="news-scroll">
		<span id="news-prev"><?php echo $paginator->prev()?></span>
		<?php if($paginator->prev() && $paginator->next()) echo " | " ?> 
		<span id="news-next"><?php echo $paginator->next();?></span>
	</div>
</div>
