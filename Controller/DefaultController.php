<?php

namespace ripnet\IPControlBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ripnetIPControlBundle:Default:index.html.twig');
    }
}
