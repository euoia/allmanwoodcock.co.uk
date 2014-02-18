<?php

/* Shared controller functions */



class AppController extends Controller {

	var $uses = array('Page', 'LargeImage', 'SmallImage');

	var $helpers = array('Html', 'Ajax', 'Session');

/*
	function generateList ($cond=null,$order=null,$limit=null,$key=null,$val=null) {
    return $this->find("list",array(
        'conditions' => $cond, 
        'order' => $order,
        'limit' => $limit,
        'fields' => array(str_replace('{n}.','',$key), str_replace('{n}.','',$val))
    ));
}*/


	function beforeFilter()

	{

		Configure::load('aw_vars');

		if(!empty($this->params['admin']) && $this->params['action'] !=

			'admin_login' && !$this->__adminCheck())

			$this->redirect('/admin/users/login');

	}



	function __adminCheck()

	{

		if($this->Session->check('user'))

		{

			$this->set('user', $this->Session->read('user'));

			$this->layout = 'admin';

			return true;

		}



		return false;

	}



	function __standard_setup($name)

	{

		if($this->Session->check('previous'))

		{

			$this->set('previous', $this->Session->read('previous'));

			$this->Session->delete('previous');

		}

		$this->layout = 'main';

		$this->set('pages', $this->Page->find('all'));

		$this->Page = $this->Page->findByName($name);

		$this->set('title_for_layout', $this->Page['Page']['title']);	

		$this->set('first_photo', $this->Page['LargeImage']);

		$this->set('photos', $this->LargeImage->find('all',array('includefade'=>'1'), null, null, null, 1, 0));



		$this->set('page_name', $name);

		$this->set('text',  $this->Page['Page']['text']);

		$this->set('meta_description', $this->Page['Page']['meta_description']);



		switch($this->Page['Page']['extra'])

		{

			case(0):

				break;

			case(1):

				$this->set('clients', $this->Client->find('all',null, null, 'name ASC'));

				$this->set('extra', 'client_element');

				break;

			case(2):

				$this->set('services', $this->Service->find('all',null, null, 'title ASC'));

				$this->set('extra', 'service_element');

				break;

			case(3):

				$this->set('portfolio', $this->Portfolio->find('all'));

				$this->set('extra', 'portfolio_element');

				break;

			case(4):

				$this->set('extra', 'jobs_element');

				break;

			case(5):

				$this->set('extra', 'address_element');

				break;

		}



		$this->render('page');

	}



	function __writelog($msg)

	{

		$outf = fopen(LOGS . 'aw_log.txt', "a");

		if($outf)

		{

			$output = sprintf("%-20s %-13s %s\n", date('d-m-y H:i:s'), $this->Session->read('user'), $msg);

			fwrite($outf, $output);

		}

	}



	function __send_mail($params)

	{

		$addresses = array ('james.pickard@gmail.com', 'info@allmanwoodcock.com');

		

		$error = false; // initialize error flag

		$problem_sending = false; // initialize problem sending flag

		$vars = array ('name', 'company', 'title', 'address', 'telephone', 'email', 'enquiry', 'additional');

		

		foreach($vars as $var)

		{

			if(isset($params[$var]))

				$post_vars[$var] = $params[$var];

			else

			{

				$msg .= '<span class="feedback">Invalid fields in form.</span>';

				$error = true;

			}

		}

		

		$ip 				= $params['ip'];

		$httpref 		= $params['httpref'];

		$httpagent 	= $params['httpagent']; 

		$msg        = '';	

		

		if(!$post_vars['email'] == "" && (!strstr($post_vars['email'],"@") || !strstr($post_vars['email'],".")))

		{

			$msg .= '<div id="feedback-box">';

			$msg .= '<span class="feedback">Please use the back button and enter a valid e-mail address.</span><br />';

			$msg .= '<span class="foot">Feedback was not submitted</span>';

			$msg .= '</div>';

		}

		elseif(empty($post_vars['name']) || empty($post_vars['email']) )

		{

			$msg .= '<div id="feedback-box">';

			$msg .= '<span class="feedback">Please use the back button and enter a name and email address.</span><br />';

			$msg .= '<span class="foot">Feedback was not submitted</span>';

			$msg .= '</div>';

		}

		elseif(!$error)

		{

			$this->Email->from = $post_vars['name'] . '<' . $post_vars['email'] . '>';

			$this->Email->replyTo = $post_vars['email'];

			$this->Email->subject = 'Allman Woodcock: Web enquiry from ' . $post_vars['name'] ;

			$this->Email->sendAs = 'html';



			date_default_timezone_set('Europe/London');

			$todayis = date("l jS F Y, g:i a");

			

			$message_body =  'You have received an enquiry through the webform associated with the website http://www.allmanwoodcock.com<br /><br />';

			$message_body .= '<b>Date:</b> ' 					. $todayis . '<br />';

			$message_body .= '<b>Name:</b> ' 					. $post_vars['name']       . '<br />';

			$message_body .= '<b>Company:</b> ' 			. $post_vars['company']    . '<br />';

			$message_body .= '<b>Title:</b> ' 				. $post_vars['title']      . '<br />';

			$message_body .= '<b>Address:</b> ' 			. $post_vars['address']    . '<br />';

			$message_body .= '<b>Telephone: </b> ' 		. $post_vars['telephone']  . '<br />';

			$message_body .= '<b>Email: </b><a href="mailto:' . $post_vars['email'] . '">' . $post_vars['email'] . '</a><br />';

			$message_body .= '<b>Enquiry: </b> ' 				. $post_vars['enquiry'] 		. '<br /><br />';

			$message_body .= '<b>Additional Info:</b> ' . $post_vars['additional'] 	. '<br /><br />';

			

			$message_body .= '<b>IP address:</b> ' 			. $ip . '<br />';

			$message_body .= '<b>Browser Info:</b> '		. $httpagent . '<br />';

			$message_body .= '<b>Referral:</b> '				. $httpref . '<br />';

			

			$problem_sending = false;

			foreach($addresses as $address)

			{

				$this->Email->to = $address;

				if(!$this->Email->send($message_body))

					$problem_sending = true;

			}

				

			if (!$problem_sending)

			{

				$title = "Thank you";

				$body =  "your message has been sent";

				

			}

			else

			{

				$title = "Sorry";

				$body = "there was a problem sending your message";

			}

			

			$msg .= '<div id="feedback-box">';

			$msg .= '<span class="title">' . $title . '</span><br />';

			$msg .= '<span class="feedback">' . $post_vars['name'] . '( ' . $post_vars['email'] . ' )<span><br>';

			$msg .= '<span class="feedback">' . $body . '</span><br />';

			$msg .= '<span class="feedback">Date: ' . $todayis . '</span><br />';

			$msg .= '</div>';



    }

		return $msg;

	}

}

?>