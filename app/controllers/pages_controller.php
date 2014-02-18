<?php
/* This controls the root pages */

class PagesController extends AppController {
	var $name = 'Pages';
	var $helpers = array('Html', 'Javascript', 'Form', 'Time');
	var $uses = array('Page', 'Service', 'Client', 'Portfolio', 'NewsItem');
	var $components = array('Email');

	function index()
	{
		$this->profile();
	}

	function profile()
	{
		$this->__standard_setup('profile');
	}
	
	function clients()
	{
		$this->__standard_setup('clients');
	}
	
	function services()
	{
		$this->__standard_setup('services');
	}
	
	function portfolio()
	{
		$this->__standard_setup('portfolio');
	}
	
	function news()
	{
		$this->paginate = array('limit'=>3, 'page'=>1, 'order'=>array('date_presented'=>'desc'));
		$this->set('news', $this->paginate('NewsItem'));
		$this->__standard_setup('news');
	}
	
	function contact_us()
	{
		if(!empty($this->params->form))
		{
			$msg = $this->__send_mail($this->params['form']);
			$this->set('msg', $msg);
		}

		$this->__standard_setup('contact_us');
	}
	
	/* Admin controls */
	function admin()
	{
		$this->redirect('/admin/pages');
	}

	function admin_view($id)
	{
		// Redundant now, the view links have been changed
		$page = $this->Page->findById($id);
		$title = $page['Page']['name'];
		$this->Session->write('previous', '/admin/pages/index');
		$this->redirect('/' . $title);
	}
	
	function admin_index()
	{
		$this->set('pages', $this->paginate());
	}
	
	function admin_edit($id)
	{
		if(empty($this->data)) {
			$this->data = $this->Page->read(null, $id);
		} else {
			$this->Page->create($this->data);
			if($this->Page->validates() && $this->Page->save()) {
				$this->__writelog("Page edited: #$id (" . $this->data['Page']['title'] . ')');
				$this->Session->setFlash('The page has been saved');
				$this->redirect('/admin/pages/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
			}
		}

		$this->set('smallImages', $this->SmallImage->find('list'));
		$this->set('largeImages', $this->LargeImage->find('list'));
		$this->set('extra', array(
			'none',
			'client list',
			'service list',
			'portfolio list',
			'job list',
			'address'
		));
		//$small_images = $this->Page->SmallImage->find('list', array('fields' => array('SmallImage.id')));
		//$large_images = $this->Page->LargeImage->find('list', array('fields' => array('LargeImage.id')));
		//$this->set(compact('small_images', 'large_images', 'extras'));
	}
	
	
}
?>
