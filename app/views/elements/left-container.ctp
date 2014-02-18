<?php $random_fadeimage_order = 2; ?>
<div id="head"></div>
<div id="image-box">

<?php 
	/* Contact Us */
	if($page_name == 'contact_us') {

		if(!empty($msg))
		{	
			/* Contact form has been completed */
			echo $msg;
		}
		else
		{
			echo $this->element('contact_form');
		}

	/* News */
	}	elseif($page_name == 'news')	{ 
			echo $this->element('news', $news);

	} else { /* Everything else */
		if($this->params['controller'] == 'portfolio' && isset($this->params['pass'])) {
			$random_fadeimage_order = 0;
		}

		?>


	<?
	} /* End everything else */
	?>

</div>
<?php
	if(isset($service_text)){
		?>
		<div id="service-info-box">
			<div id="service-info-background"></div>
			<div id="service-info-text"><?php echo $service_text; ?></div>
		</div>
		<?
	} /* End service text */
?>
<div id="foot-left"><?php echo $html->image('rics-logo.gif'); ?></div>

