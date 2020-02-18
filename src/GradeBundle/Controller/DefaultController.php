<?php

namespace GradeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Grade/Default/index.html.twig');
    }

    public function grade2Action()
    {
        return $this->render('@Grade/Default/grade2.html.twig');
    }



    public function grade3Action()
    {
        return $this->render('@Grade/Default/grade3.html.twig');
    }

}
