<?php

namespace MedcinBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Medcin/Default/index.html.twig');
    }
}
