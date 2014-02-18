<?php
// JPickard 18 June 2013.
// This controller just used for display on the website.
// I don't know how to use portfolios_controller.php instead.
class PortfolioController extends AppController {
	var $name = 'Portfolios';
	var $helpers = array('Html', 'Form', 'Session' );

	function display($title)
	{
		$portfolio_items = $this->Portfolio->find(
				array('slug'=>$title),
				array('id'),
				null,
				2
		);

		if(!$portfolio_items) {
			$this->cakeError('error404',array(array('url'=>$title)));
		}

		$this->set('portfolio_items', $portfolio_items);
		$this->__standard_setup('portfolio');
	}
}
?>
