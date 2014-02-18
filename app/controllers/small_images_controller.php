<?php

class SmallImagesController extends AppController {



	var $name = 'SmallImages';

	var $helpers = array('Ajax', 'Html', 'Form', 'Session');

	var $components = array('RequestHandler', 'Session');



	function admin_index() {

		$this->SmallImage->recursive = 0;

		$this->set('smallImages', $this->paginate());

	}



	function admin_add() {

		if (!empty($this->data)) {

			

			$this->data['SmallImage']['url'] = $this->data['SmallImage']['file']['name'];

			$this->data['SmallImage']['title'] = $this->data['SmallImage']['file']['name'];

			$this->SmallImage->create();



			$dest = IMAGES . Configure::read('small_image_dir') . DS . $this->data['SmallImage']['file']['name'];

			if(file_exists($dest))

				$this->Session->setFlash('A file with that name already exists, please rename the file then try again.');

			elseif ($this->SmallImage->save($this->data)) {

				move_uploaded_file($this->data['SmallImage']['file']['tmp_name'], $dest);

				chmod($dest, 0775);

				$message = 'The Small Image has been saved.';



				$imagesize = getimagesize($dest);

				if($imagesize[0] != Configure::read('small_image_width'))

					$message .= "<br>Warning: the image width is " . $imagesize[0] . "px and should be " . 

						Configure::read('small_image_width') . 'px.';

				if($imagesize[1] != Configure::read('small_image_width'))

					$message .= "<br>Warning: The image height is " . $imagesize[1] . "px and should be " . 

						Configure::read('small_image_height') . 'px.';



				$this->Session->setFlash($message);

				$this->__writelog("Small Image added: #" . $this->SmallImage->id

						. ' (' .$this->data['SmallImage']['url'] . ')');

				$this->redirect(array('action'=>'index'), null, true);

			} else {

				$this->Session->setFlash('The Small Image could not be saved. Please, try again.');

			}

		}

		$pages = $this->SmallImage->Page->find('list', array('fields' => array('SmallImage.id')));

		$this->set(compact('pages'));

	}



	function admin_delete($id = null) {

		if (!$id) {

			$this->Session->setFlash('Invalid id for Small Image');

			$this->redirect(array('action'=>'index'), null, true);

		}



		$small_image = $this->SmallImage->findById($id);

		$filename = $small_image['SmallImage']['url'];

		if ($this->SmallImage->delete($id)) {

				@rename(IMAGES . Configure::read('small_image_dir') .  DS . $filename,

						IMAGES . Configure::read('small_image_dir') . '.old' . DS . $filename . date('d-m-y--H-i')); 



			$this->__writelog("Small Image deleted: #$id (" . $filename . ')');

			$this->Session->setFlash('Small Image #'.$id.' deleted');

		}

		else

			$this->Session->setFlash('Invalid id for Small Image');



		$this->redirect(array('action'=>'index'), null, true);

	}



	function fetch($id) {

		if($this->RequestHandler->isAjax())

		{

			$this->set('img', $this->SmallImage->findById($id));

		}

		else

			$this->redirect('/');

	}

}

?>