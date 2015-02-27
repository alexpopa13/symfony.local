<?php

namespace Per\JobeetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PerJobeetBundle:Default:index.html.twig', array('name' => $name));
    }
}
