<?php echo $this->addScript($javascript->link('jquery.js')); ?>
<? echo $this->element('tiny_mce'); ?>
<script type="text/javascript">
	jQuery(function($) {
		$("#sLoader").hide();
		$("#lLoader").hide();

		$('select#PageSmallImageId').change(
			function(){
				$('div#smallImage').load(
					'<?php echo $html->url('/small_images/fetch/', true) ?>'
					+this.value).show("slow");
				$('div#sLoader').show();
			}
		);

		$('select#PageLargeImageId').change(
			function(){
				$('div#largeImage').load(
					'<?php echo $html->url('/large_images/fetch/', true) ?>'
					+this.value).show("slow");
				$('div#lLoader').show();
			}
		);

		$(this).ajaxStop(function(){
			$('div#sLoader').fadeOut('fast');
			$('div#lLoader').fadeOut('fast');
		});
	});
</script>
<div class="page">
<?php echo $form->create('Page');?>
	<fieldset>
 		<legend><?php echo sprintf(__('Edit %s', true), __('Page', true));?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('small_image_id');
	?>
		<div id="sLoader" style="position: absolute; font-size: .8em">
			Loading...
		</div>
		<div id="smallImage" class="indent">
			<?php echo $html->image('small_images/'.$this->data['SmallImage']['url']); ?>
		</div>
<?php
		echo $form->input('large_image_id', array(
			'label'     => 'First Fade Image',
			'onChange'  =>'$("div#large_image").load("' . $html->url('/large_images/fetch/', true) . '" + this.value).show("slow");'
		));
?>
		<div id="lLoader" style="position: absolute; font-size: .8em">
			Loading...
		</div>
		<div id="largeImage" class="indent">
			<?php echo $html->image('large_images/'.$this->data['LargeImage']['url']); ?>
		</div>
<?php
		echo $form->input('title');
		echo $form->input('name');
		echo $form->input('meta_description');

?>
		<div id="text-area">
			<?php	echo $form->input('text', array('style'=>'width:550px')); ?>
		</div>
<?php
		echo $form->input('extra');
	?>
	</fieldset>
	<div class="submit"><input type="submit" value="Submit" /></div>

	<div class="actions">
	<ul>
		<li><?php echo $html->link(sprintf(__('List %s', true), __('Pages', true)), array('action'=>'index'));?></li>
	</ul>
	</div>
</form>
</div>
