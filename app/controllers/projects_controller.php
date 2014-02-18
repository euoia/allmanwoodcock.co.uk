<?php

class ProjectsController extends AppController {

	var $name = 'Projects';

	var $helpers = array('Html', 'Form', 'Session' );



	function beforeFilter()

	{

		if(!$this->__adminCheck())

			$this->redirect('/admin/users/login');

	}

	

	function admin_index() {

		$this->Project->recursive = 0;

		$this->set('projects', $this->paginate());

	}



	function admin_view($id = null) {

		if (!$id) {

			$this->Session->setFlash('Invalid Project.');

			$this->redirect(array('action'=>'index'), null, true);

		}

		$this->set('project', $this->Project->read(null, $id));

	}



	function admin_add() {

		if (!empty($this->data)) {

			

			$this->Project->create();

			if ($this->Project->save($this->data)) {

				$this->__writelog("Project added: #" . $this->Project->id

						. ' (' .$this->data['Project']['title'] . ')');

				$this->Session->setFlash('The Project has been saved');

				$this->redirect(array('action'=>'index'), null, true);

			} else {

				$this->Session->setFlash('The Project could not be saved. Please, try again.');

			}

		}

	}



	function admin_edit($id = null) {

		if (!$id && empty($this->data)) {

			$this->Session->setFlash('Invalid Project');

			$this->redirect(array('action'=>'index'), null, true);

		}

		if (!empty($this->data)) {

			

			if ($this->Project->save($this->data)) {

				$this->__writelog("Project edited: #$id (" . $this->data['Project']['title'] . ')');

				$this->Session->setFlash('The Project has been saved');

				$this->redirect(array('action'=>'index'), null, true);

			} else {

				$this->Session->setFlash('The Project could not be saved. Please, try again.');

			}

		}

		if (empty($this->data)) {

			$this->data = $this->Project->read(null, $id);

		}

	}



	function admin_delete($id = null) {

		if (!$id) {

			$this->Session->setFlash('Invalid id for Project');

			$this->redirect(array('action'=>'index'), null, true);

		}



		$project = $this->Project->findById($id);

		if($project)

			$title = $project['Project']['title'];

		if ($this->Project->delete($id)) {

			$this->__writelog("Project deleted: #$id (" . $title . ')');

			$this->Session->setFlash('Project #'.$id.' deleted');

			$this->redirect(array('action'=>'index'), null, true);

		}

	}

}

?>