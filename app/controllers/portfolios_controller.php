<?php
// JPickard 18 June 2013.
// Admin controller for Portfolios.
class PortfoliosController extends AppController {
	var $name = 'Portfolios';
	var $helpers = array('Html', 'Form', 'Session' );

	function admin_index() {
		$this->Portfolio->recursive = 1;
		$this->set('portfolios', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid Portfolio.');
			$this->redirect(array('action'=>'index'), null, true);
		}
		$this->set('portfolio', $this->Portfolio->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Portfolio->create();
			if ($this->Portfolio->save($this->data)) {
				$this->__writelog("Portfolio added: #" . $this->Portfolio->id
						. ' (' .$this->data['Portfolio']['title'] . ')');
				$this->Session->setFlash('The Portfolio has been saved');
				$this->redirect(array('action'=>'index'), null, true);
			} else {
				$this->Session->setFlash('The Portfolio could not be saved. Please, try again.');
			}
		}
		$projects = $this->Portfolio->Project->find('list', array('fields' => array('Project.id')));
		$this->set(compact('projects'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Invalid Portfolio');
			$this->redirect(array('action'=>'index'), null, true);
		}

		if (!empty($this->data)) {
			$this->Portfolio->PortfoliosProject->deleteAll(array('PortfoliosProject.portfolio_id' => $id), false);

			if ($this->Portfolio->save($this->data)) {
				$this->__writelog("Portfolio edited: #$id (" . $this->data['Portfolio']['title'] . ')');
				$this->Session->setFlash('The Portfolio has been saved');
				$this->redirect(array('action'=>'index'), null, true);
			} else {
				$this->Session->setFlash('The Portfolio could not be saved. Please, try again.');
			}
		}

		if (empty($this->data)) {
			$this->data = $this->Portfolio->read(null, $id);
		}

		$projects = $this->Portfolio->Project->find('list', array('fields' => array('Project.title')));
		$this->set(compact('projects'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Portfolio');
			$this->redirect(array('action'=>'index'), null, true);
		}

		$portfolio = $this->Portfolio->findById($id);
		if($portfolio)
			$title = $portfolio['Portfolio']['title'];
		if ($this->Portfolio->delete($id)) {
			$this->__writelog("Portfolio deleted: #$id (" . $title . ')');
			$this->Session->setFlash('Portfolio #'.$id.' deleted');
			$this->redirect(array('action'=>'index'), null, true);
		}
	}
}
?>
