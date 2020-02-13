<?php

namespace InventaireBundle\Controller;

use InventaireBundle\Form\SalaireType;
use InventaireBundle\Entity\Salaire;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class salaireController extends Controller
{
    public function readAction()
    {
        $em=$this->getDoctrine();
        $tab=$em->getRepository(salaire::class)->findAll();
        return $this->render('@Inventaire/salaire/read.html.twig', array(
            'Salaire'=>$tab
        ));
    }
    public function createAction(Request $request)
    {
        //creation objet vide
        $Salaire = new Salaire();
        // creer notre formulaire
        $form=$this->createForm(SalaireType::class,$Salaire);
        //recuperation de donnes
        $form=$form->handleRequest($request);
        //test sur les donnees
        if($form->isValid())
        {
            //creation d un objet doctrine
            $em=$this->getDoctrine()->getManager();
            //persister les donnees dans ORM
            $em->persist($Salaire);
            //sauvegarder les donnees dans BD
            $em->flush();
            return $this->redirectToRoute('read_salaire');
        }


        // envoyer ce formulaire à l utilisateur
        return $this->render('@Inventaire/salaire/create.html.twig', array(
            'form'=>$form->createView()
        ));
    }

    public function deleteAction($id)
    {
        $em=$this->getDoctrine()->getManager();

        $Salaire=$em->getRepository(Salaire::class)->find($id);
        $em->remove($Salaire);
        $em->flush();
        return $this->redirectToRoute('read_salaire');

    }
    public function updateAction($id,Request $request)
    {
        //recuperation de l objet selon l ID envoyer par user
        //em stands for entity manager
        $em=$this->getDoctrine()->getManager();

        $Salaire=$em->getRepository(Salaire::class)->find($id);
        // creer notre formulaire
        $form=$this->createForm(SalaireType::class,$Salaire);
        //recuperation de donnes
        $form=$form->handleRequest($request);
        //test sur les donnees
        if($form->isValid())
        {
            //creation d un objet doctrine
            //$em=$this->getDoctrine()->getManager();

            //sauvegarder les donnees dans BD
            $em->flush();
            return $this->redirectToRoute('read_salaire');
        }


        // envoyer ce formulaire à l utilisateur
        return $this->render('@Inventaire/salaire/update.html.twig', array(
            'form'=>$form->createView()));
    }








}
