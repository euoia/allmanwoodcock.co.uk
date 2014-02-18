<?php
class ClientsController extends AppController {
	var $name = 'Clients';
	var $helpers = array('Html', 'Form', 'Ajax' , 'Session');
	var $components = array('RequestHandler', 'Session');
	var $paginate = array('limit' => 40, 'page'=>1);


	function admin_index() {
		if(!$this->__adminCheck())
			$this->redirect('/admin/users/login');

		$this->Client->recursive = 0;
		$this->set('clients', $this->paginate(null, 40));
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid Client.');
			$this->redirect(array('action'=>'index'), null, true);
		}
		$this->set('client', $this->Client->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
						$this->Client->create();
			if ($this->Client->save($this->data)) {
				$this->__writelog("Client added: #" . $this->Client->id
						. ' (' .$this->data['Client']['name'] . ')');
				$this->Session->setFlash('The Client has been saved');
				$this->redirect('/admin/clients/');
			} else {
				$this->Session->setFlash('The Client could not be saved. Please, try again.');
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Invalid Client');
			$this->redirect(array('action'=>'index'), null, true);
		}
		if (!empty($this->data)) {
			if ($this->Client->save($this->data)) {
				$this->Session->setFlash('The Client has been saved');
				$this->__writelog("Client edited: #" . $id
						. ' (' .$this->data['Client']['name'] . ')');
				$this->redirect('/admin/clients/');
			} else {
				$this->Session->setFlash('The Client could not be saved. Please, try again.');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Client->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Client');
			$this->redirect(array('action'=>'index'), null, true);
		}

		$client = $this->Client->findById($id);
		$name = $client['Client']['name'];

		if ($this->Client->delete($id)) {
			$this->__writelog("Client deleted: #$id (" . $name . ')');
			$this->Session->setFlash('Client #'.$id.' deleted');
		}
		else
			$this->Session->setFlash('Invalid id for Client');

		$this->redirect(array('action'=>'index'), null, true);
	}

}
?>