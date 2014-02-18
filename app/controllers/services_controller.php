<?php



class ServicesController extends AppController {

	var $name = 'Services';

	var $helpers = array('Html', 'Form', 'Javascript', 'Session');

	var $uses = array('Service', 'Page' );



	var $paginate = array('limit' => 40, 'page'=>1);

	var $layout = 'main';



	function display($title)

	{

		$service = $this->Service->findBySlug($title);

		$subpage_id = $title;

		

		$this->set('subpage_id', $subpage_id);

		$this->set('service_text', $service['Service']['description']);

		$this->set('services', $this->Service->find('all'));

		$this->__standard_setup('services');

	}



	function admin_index() {

		$this->Service->recursive = 0;

		$this->set('services', $this->paginate());

	}



	function admin_view($id = null) {

		if (!$id) {

			$this->Session->setFlash('Invalid Service.');

			$this->redirect(array('action'=>'index'), null, true);

		}

		$this->set('service', $this->Service->read(null, $id));

	}



	function admin_add() {

		if (!empty($this->data)) {

			

			$this->Service->create();

			if ($this->Service->save($this->data)) {

				$this->Session->setFlash('The Service has been saved');

				$this->redirect(array('action'=>'index'), null, true);

			} else {

				$this->Session->setFlash('The Service could not be saved. Please, try again.');

			}

		}

	}



	function admin_edit($id = null) {

		if (!$id && empty($this->data)) {

			$this->Session->setFlash('Invalid Service');

			$this->redirect(array('action'=>'index'), null, true);

		}

		if (!empty($this->data)) {

			

			if ($this->Service->save($this->data)) {

				$this->Session->setFlash('The Service has been saved');

				$this->redirect(array('action'=>'index'), null, true);

			} else {

				$this->Session->setFlash('The Service could not be saved. Please, try again.');

			}

		}

		if (empty($this->data)) {

			$this->data = $this->Service->read(null, $id);

		}

	}



	function admin_delete($id = null) {

		if (!$id) {

			$this->Session->setFlash('Invalid id for Service');

			$this->redirect(array('action'=>'index'), null, true);

		}

		if ($this->Service->delete($id)) {

			$this->Session->setFlash('Service #'.$id.' deleted');

			$this->redirect(array('action'=>'index'), null, true);

		}

	}

}

?>