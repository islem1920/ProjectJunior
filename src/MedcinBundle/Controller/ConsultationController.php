<?php

namespace MedcinBundle\Controller;

use MedcinBundle\Entity\Consultation;
use MedcinBundle\Entity\Medcin;
use MedcinBundle\Form\ConsultationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ConsultationController extends Controller
{
    public function createAction(Request $request)
    {
        //creation objet vide
        $consultation = new Consultation();
        // creer notre formulaire
        $form=$this->createForm(ConsultationType::class,$consultation);
        //recuperation de donnes
        $form=$form->handleRequest($request);
        //test sur les donnees
        if($form->isValid())
        {
            //creation d un objet doctrine
            $em=$this->getDoctrine()->getManager();
            //persister les donnees dans ORM
            $em->persist($consultation);
            //sauvegarder les donnees dans BD
            $em->flush();
            return $this->redirectToRoute('read_consultation');
        }


        // envoyer ce formulaire à l utilisateur
        return $this->render('@Medcin/Consultation/create.html.twig', array(
            'form'=>$form->createView()
        ));
    }

    public function readAction()
    {
        //Creer un objet Doctrine
        $em=$this->getDoctrine();
        $tab=$em->getRepository(Consultation::class)->findAll();
        return $this->render('@Medcin/Consultation/read.html.twig', array(
            'consul'=>$tab
        ));
    }

    public function updateAction(Request $request,$id)
    {
        //recuperation de l objet selon l ID envoyer par user
        //em stands for entity manager
        $em=$this->getDoctrine()->getManager();

        $consultation=$em->getRepository(Consultation::class)->find($id);
        // creer notre formulaire
        $form=$this->createForm(ConsultationType::class,$consultation);
        //recuperation de donnes
        $form=$form->handleRequest($request);
        //test sur les donnees
        if($form->isValid())
        {
            //creation d un objet doctrine
            //$em=$this->getDoctrine()->getManager();

            //sauvegarder les donnees dans BD
            $em->persist($consultation);
            $em->flush();
            return $this->redirectToRoute('read_consultation');
        }

        // envoyer ce formulaire à l utilisateur
        return $this->render('@Medcin/Consultation/update.html.twig', array(
            'form'=>$form->createView()
        ));
    }

    public function deleteAction($id)
    {
        $em=$this->getDoctrine()->getManager();

        $consultation=$em->getRepository(Consultation::class)->find($id);
        $em->remove($consultation);
        $em->flush();
        return $this->redirectToRoute('read_consultation');

    }

}
