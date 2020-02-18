<?php

namespace GradeBundle\Controller;

use GradeBundle\Entity\Classe;
use GradeBundle\Entity\Grade;
use GradeBundle\Form\ClasseType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ClasseController extends Controller
{
    public function readAction()
    {
        $em=$this->getDoctrine();
        $tab=$em->getRepository(Classe::class)->findAll();

        return $this->render('@Grade/Classe/read.html.twig', array(
            'classes'=>$tab

        ));
    }

    public function createAction( Request $request)
    {
        //CREATE OBJET VIDE
      $classe = new Classe();
       $form=$this->createForm(ClasseType::class,$classe);
        $form=$form->handleRequest($request);
        if($form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($classe);
            $em->flush();
            return $this->redirectToRoute('readclasse');

        }


        return $this->render('@Grade/Classe/create.html.twig', array(
            'form'=>$form->createView()

        ));
    }

    public function updateAction($idcl, Request $request)
    {
        $em=$this->getDoctrine()->getManager();

        $classe =$em->getRepository(Classe::class)->find($idcl);
        // creer notre formulaire
        $form=$this->createForm(ClasseType::class,$classe);
        //recuperation de donnes
        $form=$form->handleRequest($request);
        //test sur les donnees
        if($form->isValid())
        {
            //creation d un objet doctrine
            //$em=$this->getDoctrine()->getManager();

            //sauvegarder les donnees dans BD
            $em->flush();
            return $this->redirectToRoute('readclasse');
        }
        return $this->render('@Grade/Classe/update.html.twig', array(
            'form'=>$form->createView()));
    }

    public function deleteAction($idcl)
    {
        $em=$this->getDoctrine()->getManager();
        $classe=$em->getRepository(Classe::class)->find($idcl);
        $em->remove($classe);
        $em->flush();
        return $this->redirectToRoute('readclasse') ;

    }

    public function searchAction()
    {
        return $this->render('@Grade/Classe/search.html.twig', array(
            // ...
        ));
    }

}
