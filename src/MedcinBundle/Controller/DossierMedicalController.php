<?php

namespace MedcinBundle\Controller;

use MedcinBundle\Entity\DossierMedical;
use MedcinBundle\Form\DossierMedicalType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DossierMedicalController extends Controller
{
    public function createAction(Request $request)
    {
        //creation objet vide
        $dossiermedical = new DossierMedical();
        // creer notre formulaire
        $form = $this->createForm(DossierMedicalType::class, $dossiermedical);
        //recuperation de donnes
        $form = $form->handleRequest($request);
        //test sur les donnees
        if ($form->isValid()) {
            //creation d un objet doctrine
            $em = $this->getDoctrine()->getManager();
            //persister les donnees dans ORM
            $em->persist($dossiermedical);
            //sauvegarder les donnees dans BD
            $em->flush();
            return $this->redirectToRoute('read_dm');
        }
        // envoyer ce formulaire à l utilisateur
        return $this->render('@Medcin/DossierMedical/create.html.twig', array(
            'form'=>$form->createView()
        ));
    }
    public function readAction()
    {
        //Creer un objet Doctrine
        $em=$this->getDoctrine();
        $tab=$em->getRepository(DossierMedical::class)->findAll();
        return $this->render('@Medcin/DossierMedical/read.html.twig', array(
            'dossier'=>$tab
        ));
    }

    public function updateAction()
    {
        return $this->render('MedcinBundle:DossierMedical:update.html.twig', array(
            // ...
        ));
    }

    public function deleteAction()
    {
        return $this->render('MedcinBundle:DossierMedical:delete.html.twig', array(
            // ...
        ));
    }

}
