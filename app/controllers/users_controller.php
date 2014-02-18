<?php

define('SALT', 's92hdbv3');



class UsersController extends AppController {



	var $name = 'Users';

	var $helpers = array('Html', 'Form', 'Session' );



	function admin_login() {

		if($this->Session->check('user'))

			$this->redirect('/admin/pages');

		

		if(!empty($this->data)){

			// User has entered some data		

			if($this->User->create($this->data) && $this->User->validates())

			{

				$result = $this->User->findByUsername($this->data['User']['username']); 

				if($result && $result['User']['password'] == $this->__encode_password($this->data['User']['password']))

				{

					$this->Session->write('user', $this->User->data['User']['username']);

					$this->__writelog('logged in.');

					$this->redirect('/admin/pages');

				} else {

					$this->Session->setFlash('Invalid username or password.');

				}	

			}

		}

	}



	function admin_logout(){

		$this->__writelog('logged out.');

		$this->Session->destroy();

		$this->redirect('/');

	}

	

	function admin_index() {

		$this->User->recursive = 0;

		$this->set('users', $this->paginate('User'));

	}



	function admin_view($id = null) {

		if (!$id) {

			$this->Session->setFlash('Invalid User.');

			$this->redirect(array('action'=>'index'), null, true);

		}

		$this->set('user', $this->User->read(null, $id));

	}



	function admin_add() {

		if (!empty($this->data)) {

			

			$this->data['User']['password'] = $this->__encode_password($this->data['User']['password']);

			$this->User->create();

			if ($this->User->save($this->data)) {

				$this->Session->setFlash('The User has been saved');

				$this->__writelog('added User: #' . $this->User->id . ' ('.$this->data['User']['username'].')');

				$this->redirect(array('action'=>'index'), null, true);

			} else {

				$this->Session->setFlash('The User could not be saved. Please, try again.');

			}

		}

	}



	function admin_edit($id = null) {

		if (!$id && empty($this->data)) {

			$this->Session->setFlash('Invalid User');

			$this->redirect(array('action'=>'index'), null, true);

		}

		if (!empty($this->data)) {

			

			if ($this->User->save($this->data)) {

				$this->Session->setFlash('The User has been saved');

				$this->__writelog('edited User: #' . $id .' ('.$this->data['User']['username'].')');

				$this->redirect(array('action'=>'index'), null, true);

			} else {

				$this->Session->setFlash('The User could not be saved. Please, try again.');

			}

		}

		if (empty($this->data)) {

			$this->data = $this->User->read(null, $id);

		}

	}



	

	function admin_delete($id = null) {

		if (!$id) {

		$this->Session->setFlash('Invalid id for User');

		$this->redirect(array('action'=>'index'), null, true);

		}



		$user = $this->User->findById($id);

		$username = $user['User']['username'];



		if($this->User->findCount() == 1)

		{

			$this->Session->setFlash('You may not delete the last user.');

		}

		elseif ($this->User->delete($id))

		{

			$this->__writelog('deleted User: #' . $id .' ('.$username.')');

			$this->Session->setFlash('User #'.$id.' deleted');

		}

		

		$this->redirect(array('action'=>'index'), null, true);

	}

	

	function __encode_password($password)

	{

		return md5($password . SALT);

	}

}

?>