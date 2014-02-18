<?php echo $text;?>
<?php 
if(isset($extra)){
	echo '<!-- extra -->';
	echo $this->element($extra);
	echo '<!-- end extra -->';
}
?> 
