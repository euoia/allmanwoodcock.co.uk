<?php echo $this->addScript($javascript->link('tiny_mce/tiny_mce.js')); ?>
<script type="text/javascript">
    tinyMCE.init({
        theme : "simple",
        mode : "textareas",
        convert_urls : false
    });
</script>
