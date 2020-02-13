<?php

namespace InventaireBundle\Controller;

use InventaireBundle\Entity\Enseignant;
use InventaireBundle\Form\EnseignantType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EnseignantController extends Controller
{
    public function readAction()
    {
        $em=$this->getDoctrine();
        $tab=$em->getRepository(Enseignant::class)->findAll();
        return $this->render('@Inventaire/Enseignant/read.html.twig', array(
            'Enseignant'=>$tab
        ));
    }

    public function createAction(Request $request)
    {
        //creation objet vide
        $enseignant = new Enseignant();
        // creer notre formulaire
        $form=$this->createForm(EnseignantType::class,$enseignant);
        //recuperation de donnes
        $form=$form->handleRequest($request);
        //test sur les donnees
        if($form->isValid())
        {
            //creation d un objet doctrine
            $em=$this->getDoctrine()->getManager();
            //persister les donnees dans ORM
            $em->persist($enseignant);
            //sauvegarder les donnees dans BD
            $em->flush();
            return $this->redirectToRoute('read_enseignant');
        }


        // envoyer ce formulaire à l utilisateur
        return $this->render('@Inventaire/Enseignant/create.html.twig', array(
            'form'=>$form->createView()
        ));
    }
    public function deleteAction($id)
    {
        $em=$this->getDoctrine()->getManager();

        $enseignant=$em->getRepository(Enseignant::class)->find($id);
        $em->remove($enseignant);
        $em->flush();
        return $this->redirectToRoute('read_enseignant');

    }

}
