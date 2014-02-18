<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<meta name="verify-v1" content="0T1HiTgsYqjhLswTHnGu85xh1wP7/A58O2WmJjCqTpA=" />
		<meta NAME="Description" CONTENT="<?php echo $meta_description?>" />
		<title><?php echo $title_for_layout;?></title>
		<link rel="shortcut icon" href="<?php echo $this->webroot . 'favicon.ico';?>" type="image/x-icon" />

		<?php echo $html->css('mainstyle');?>
		<?php echo $this->element('header_css'); ?>

		<?php echo $javascript->link('jquery') ?>
		<?php if( !($page_name == 'contact_us' || $page_name == 'news') ){ echo $javascript->link('fadescript'); } ?>

		<?php echo $javascript->link('preload'); ?>

		<!-- Inline javascript -->
		<?php echo $this->element('fade_images'); ?>	

		<link rel="icon" href="<?php echo $this->webroot;?>favicon.ico" type="image/x-icon" />
	</head>

	<body>
		<div id="horizon">
			<div id="wrapper">
				<?php if ($session->check('Message.flash')){  $session->flash();	} ?>

				<div id="left-container">	
					<?php echo $this->element('left-container'); ?>
				</div>

				<div id="right-container">
					<?php echo $this->element('links') ?>

					<div id="content-box">
						<?php echo $content_for_layout; ?>
					</div>

				</div>
				<div id="foot-right"><span class="web-ad">T:  01603 610 243</span></div>
			</div>
		</div>

	</body>
</html>
