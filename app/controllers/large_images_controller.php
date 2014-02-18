<?php
class LargeImagesController extends AppController {
	var $name = 'LargeImages';
	var $helpers = array('Ajax', 'Html', 'Form', 'Session');
	var $components = array('RequestHandler', 'Session');

	function admin_index() {
		$this->Session->write('Config.language', 'eng');  
		$this->LargeImage->recursive = 0;
		$this->set('largeImages', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid Large Image.');
			$this->redirect(array('action'=>'index'), null, true);
		}
		$this->set('largeImage', $this->LargeImage->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			
			$this->data['LargeImage']['url'] = $this->data['LargeImage']['file']['name'];
			if(empty($this->data['LargeImage']['title']))
				$this->data['LargeImage']['title'] = $this->data['LargeImage']['url'];

			$this->LargeImage->create();
			$dest = IMAGES . Configure::read('large_image_dir') . DS . $this->data['LargeImage']['file']['name'];
			if(file_exists($dest))
				$this->Session->setFlash('A file with that name already exists, please rename the file then try again.');
			elseif ($this->LargeImage->save($this->data)) {
				move_uploaded_file($this->data['LargeImage']['file']['tmp_name'], $dest);
				chmod($dest, 0775);
				$message = 'The Large Image has been saved.';

				$imagesize = getimagesize($dest);
				if($imagesize[0] != Configure::read('large_image_width'))
					$message .= "<br>Warning: the image width is " . $imagesize[0] . "px and should be " . 
						Configure::read('large_image_width') . 'px.';
				if($imagesize[1] != Configure::read('large_image_width'))
					$message .= "<br>Warning: The image height is " . $imagesize[1] . "px and should be " . 
						Configure::read('large_image_height') . 'px.';

				$this->Session->setFlash($message);
				$this->__writelog("Large Image added: #" . $this->LargeImage->id
						. ' (' .$this->data['LargeImage']['url'] . ')');
				$this->redirect(array('action'=>'index', 'page'=>'last'), null, true);
			} else {
				$this->Session->setFlash('The Large Image could not be saved. Please, try again.');
			}
		}
		$projects = $this->LargeImage->Project->find('list', array('fields' => array('Project.id')));
		$this->set(compact('projects'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Invalid Large Image');
			$this->redirect(array('action'=>'index'), null, true);
		}

		if (!empty($this->data)) {
			
			if ($this->LargeImage->save($this->data)) {
				$this->Session->setFlash('The Large Image has been saved');
				$this->__writelog("Large Image edited: #$id (" . $this->data['LargeImage']['title'] . ')');
				$this->redirect(array('action'=>'index'), null, true);
			} else {
				$this->Session->setFlash('The Large Image could not be saved. Please, try again.');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->LargeImage->read(null, $id);
		}
		$projects = $this->LargeImage->Project->find('list', array('fields' => array('Project.id')));
		$this->set(compact('projects'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Large Image');
			$this->redirect(array('action'=>'index'), null, true);
		}

		$large_image = $this->LargeImage->findById($id);
		if($large_image)
			$filename = $large_image['LargeImage']['url'];
		if ($this->LargeImage->delete($id)) {
				@rename(IMAGES . Configure::read('large_image_dir') .  DS . $filename,
						IMAGES . Configure::read('large_image_dir') . '.old' . DS . $filename . date('d-m-y--H-i')); 

			$this->__writelog("Large Image deleted: #$id (" . $filename . ')');
			$this->Session->setFlash('Large Image #'.$id.' deleted');
		}
		else
			$this->Session->setFlash('Invalid id for Large Image');

		$this->redirect(array('action'=>'index'), null, true);
	}

	function fetch($id) {
		if($this->RequestHandler->isAjax())
		{
			$this->set('img', $this->LargeImage->findById($id));
		}
		else
			ErrorHandler::error404();
	}

}
?>