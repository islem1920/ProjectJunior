<?php

namespace MedcinBundle\Controller;

use MedcinBundle\Entity\Medcin;
use MedcinBundle\Form\MedcinType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MedcinController extends Controller
{

    public function createAction(Request $request)
    {
        //creation objet vide
        $medcin = new Medcin();
        // creer notre formulaire
        $form=$this->createForm(MedcinType::class,$medcin);
        //recuperation de donnes
        $form=$form->handleRequest($request);
        //test sur les donnees
        if($form->isValid())
        {
            //creation d un objet doctrine
            $em=$this->getDoctrine()->getManager();
            //persister les donnees dans ORM
            $em->persist($medcin);
            //sauvegarder les donnees dans BD
            $em->flush();
            return $this->redirectToRoute('read_medecin');
        }
        // envoyer ce formulaire à l utilisateur
        return $this->render('@Medcin/Medcin/create.html.twig', array(
            'form'=>$form->createView()
        ));
    }

    public function readAction()
    {
        //Creer un objet Doctrine
        $em=$this->getDoctrine();
        $tab=$em->getRepository(Medcin::class)->findAll();
        return $this->render('@Medcin/Medcin/read.html.twig', array(
            'consul'=>$tab
        ));
    }

    public function updateAction(Request $request,$id)
    {
        //recuperation de l objet selon l ID envoyer par user
        //em stands for entity manager
        $em=$this->getDoctrine()->getManager();

        $medcin=$em->getRepository(Medcin::class)->find($id);
        // creer notre formulaire
        $form=$this->createForm(MedcinType::class,$medcin);
        //recuperation de donnes
        $form=$form->handleRequest($request);
        //test sur les donnees
        if($form->isValid())
        {
            //creation d un objet doctrine
            //$em=$this->getDoctrine()->getManager();

            //sauvegarder les donnees dans BD
            $em->persist($medcin);
            $em->flush();
            return $this->redirectToRoute('read_medecin');
        }
        // envoyer ce formulaire à l utilisateur
        return $this->render('@Medcin/Medcin/update.html.twig', array(
            'form'=>$form->createView()
        ));
    }

    public function deleteAction($id)
    {
        $em=$this->getDoctrine()->getManager();

        $medcin=$em->getRepository(Medcin::class)->find($id);
        $em->remove($medcin);
        $em->flush();
        return $this->redirectToRoute('read_medecin');
    }

}
