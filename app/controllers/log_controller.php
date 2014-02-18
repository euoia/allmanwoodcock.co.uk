<?php

class LogController extends AppController {

	var $uses = null; // no model



	function admin_index() {

		$content = file_get_contents(LOGS . 'aw_log.txt');

		if($content)

			$content = str_replace("\n", "<br>", $content);

		else

			$content = "Log is empty.";

		

		$this->set('content', $content);

	}



	function admin_delete()

	{

		unlink(LOGS . 'aw_log.txt');

		$this->redirect(array('action'=>'index'), null, true);

	}



}

