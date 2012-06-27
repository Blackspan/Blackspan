<?php

namespace Webapp\BlackspanBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

	public function indexAction() {
		return $this
				->render('WebappBlackspanBundle:Default:index.html.twig',
						array());
	}
}
