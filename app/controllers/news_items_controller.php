<?php

class NewsItemsController extends AppController {



	var $name = 'NewsItems';

	var $helpers = array('Html', 'Form', 'Session' );



	function admin_index() {

		$this->NewsItem->recursive = 0;

		$this->set('newsItems', $this->paginate());

	}



	function admin_view($id = null) {

		if (!$id) {

			$this->Session->setFlash('Invalid News Item.');

			$this->redirect(array('action'=>'index'), null, true);

		}

		$this->set('newsItem', $this->NewsItem->read(null, $id));

	}



	function admin_add() {

		if (!empty($this->data)) {

			

			$this->NewsItem->create();

			if ($this->NewsItem->save($this->data)) {

				$this->Session->setFlash('The News Item has been saved');

				$this->__writelog("News Item added: #" . $this->NewsItem->id);

				$this->redirect(array('action'=>'index'), null, true);

			} else {

				$this->Session->setFlash('The News Item could not be saved. Please, try again.');

			}

		}

		$smallImages = $this->NewsItem->SmallImage->find('list', array('fields' => array('SmallImage.id')));

		$this->set(compact('smallImages'));

	}



	function admin_edit($id = null) {

		if (!$id && empty($this->data)) {

			$this->Session->setFlash('Invalid News Item');

			$this->redirect(array('action'=>'index'), null, true);

		}

		if (!empty($this->data)) {

			

			if ($this->NewsItem->save($this->data)) {

				$this->__writelog("News Item edited: #" . $id);

				$this->Session->setFlash('The News Item has been saved');

				$this->redirect(array('action'=>'index'), null, true);

			} else {

				$this->Session->setFlash('The News Item could not be saved. Please, try again.');

			}

		}

		if (empty($this->data)) {

			$this->data = $this->NewsItem->read(null, $id);

		}

		$smallImages = $this->NewsItem->SmallImage->find('list', array('fields' => array('SmallImage.id')));

		$this->set(compact('smallImages'));

	}



	function admin_delete($id = null) {

		if (!$id) {

			$this->Session->setFlash('Invalid id for News Item');

			$this->redirect(array('action'=>'index'), null, true);

		}

		if ($this->NewsItem->delete($id)) {

			$this->__writelog("News Item deleted: #" . $id);

			$this->Session->setFlash('News Item #'.$id.' deleted');

			$this->redirect(array('action'=>'index'), null, true);

		}

	}



}

?>