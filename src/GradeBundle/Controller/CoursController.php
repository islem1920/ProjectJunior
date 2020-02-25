<?php

namespace GradeBundle\Controller;

use GradeBundle\Entity\Cours;
use GradeBundle\Form\ClasseType;
use GradeBundle\Form\CoursType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CoursController extends Controller
{
    public function readAction()
    {

        $em=$this->getDoctrine();
        $tab=$em->getRepository(Cours::class)->findAll();
        return $this->render('@Grade/Cours/read.html.twig', array(
            'cou'=>$tab
        ));
    }

    public function createAction(Request $request)
    {

     $cours = new Cours() ;
     $form=$this->createForm(CoursType::class,$cours);
     $form=$form->handleRequest($request);
     if($form->isValid())
     {


         $em=$this->getDoctrine()->getManager();
         $em->persist($cours);
         $em->flush();
         return $this->redirectToRoute('readcours');

     }
        return $this->render('@Grade/Cours/create.html.twig', array(

          'form'=>$form->createView()
        ));
    }



    public function updateAction($id, Request $request)
    {


        $em=$this->getDoctrine()->getManager();

        $cours =$em->getRepository(Cours::class)->find($id);
        // creer notre formulaire
        $form=$this->createForm(CoursType::class,$cours);
        //recuperation de donnes
        $form=$form->handleRequest($request);
        //test sur les donnees
        if($form->isValid())
        {


            //sauvegarder les donnees dans BD
            $em->flush();
            return $this->redirectToRoute('readcours');
        }
        return $this->render('@Grade/Cours/update.html.twig', array(
            'form'=>$form->createView())
        );


    }

    public function deleteAction($id)
    {

        $em=$this->getDoctrine()->getManager();
        $cours=$em->getRepository(Cours::class)->find($id);
        $em->remove($cours);
        $em->flush();
        return $this->redirectToRoute('readcours') ;
        return $this->render('@Grade/Cours/delete.html.twig', array(

        ));
    }

}
