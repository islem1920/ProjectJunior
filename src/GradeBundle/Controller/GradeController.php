<?php

namespace GradeBundle\Controller;

use GradeBundle\Entity\Grade;
use GradeBundle\Form\GradeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GradeController extends Controller
{
    public function readAction()
    {
        $em=$this->getDoctrine();
        $tab=$em->getRepository(Grade::class)->findAll();

        return $this->render('@Grade/Grade/read.html.twig', array(
            'gra'=>$tab
        ));
    }

    public function createAction(Request $request)
    {
        //CREATE OBJET VIDE
        $grade = new Grade();
        $form=$this->createForm(GradeType::class,$grade);
        $form=$form->handleRequest($request);
        if($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($grade);
            $em->flush();
            return $this->redirectToRoute('readgrade');
        }
        return $this->render('@Grade/Grade/create.html.twig', array(
            'form'=>$form->createView()
        ));
    }

    public function updateAction($idgr,Request $request)
    {

        $em=$this->getDoctrine()->getManager();

        $grade =$em->getRepository(Grade::class)->find($idgr);
        // creer notre formulaire
        $form=$this->createForm(GradeType::class,$grade);
        //recuperation de donnes
        $form=$form->handleRequest($request);
        //test sur les donnees
        if($form->isValid())
        {
            //creation d un objet doctrine
            //$em=$this->getDoctrine()->getManager();

            //sauvegarder les donnees dans BD
            $em->flush();
            return $this->redirectToRoute('readgrade');
        }
        return $this->render('@Grade/Grade/update.html.twig', array(
            'form'=>$form->createView()));

    }

    public function deleteAction($idgr)
    {
        $em=$this->getDoctrine()->getManager();
        $grade=$em->getRepository(Grade::class)->find($idgr);
        $em->remove($grade);
        $em->flush();
        return $this->redirectToRoute('readgrade') ;




    }

}
