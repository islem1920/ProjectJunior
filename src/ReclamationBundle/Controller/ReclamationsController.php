<?php

namespace ReclamationBundle\Controller;


use ReclamationBundle\Entity\Reclamations;
use ReclamationBundle\Form\ReclamationsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class ReclamationsController extends Controller
{
    public function readAction()
    {
        $em=$this->getDoctrine();
        $tab=$em->getRepository(Reclamations::class)->findAll();
        return $this->render('@Reclamation/Reclamations/read.html.twig', array(
            'Reclamations'=>$tab
        ));
    }

    public function createAction(Request $request)
    {
        //creation objet vide
        $reclamation = new Reclamations();
        // creer notre formulaire
        $form=$this->createForm(ReclamationsType::class,$reclamation);
        //recuperation de donnes
        $form=$form->handleRequest($request);
        //test sur les donnees
        if($form->isValid())
        {
            //creation d un objet doctrine
            $em=$this->getDoctrine()->getManager();
            //persister les donnees dans ORM
            $reclamation->setReponse(NULL);
            $em->persist($reclamation);
            //sauvegarder les donnees dans BD
            $em->flush();
            return $this->redirectToRoute('reclamation_read');
        }


        // envoyer ce formulaire à l utilisateur
        return $this->render('@Reclamation/Reclamations/create.html.twig', array(
            'form'=>$form->createView()
        ));
    }


    public function deleteAction($id)
    {
        $em=$this->getDoctrine()->getManager();

        $Salaire=$em->getRepository(Reclamations::class)->find($id);
        $em->remove($Salaire);
        $em->flush();
        return $this->redirectToRoute('reclamation_read');

    }


    public function  updateAction($id,Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $reclamation = new Reclamations();
        $reclamation=$em->getRepository(Reclamations::class)->find($id);
        $form=$this->createForm(ReclamationsType::class,$reclamation);
        $form=$form->handleRequest($request);
        if($form->isValid())
        {
            $em->persist($reclamation);
            $em->flush();
            return $this->redirectToRoute('reclamation_read');

        }


        return $this->render('@Reclamation/Reclamations/update.html.twig', array(
            'form'=>$form->createView()
        ));
    }

}
