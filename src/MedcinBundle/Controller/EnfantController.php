<?php

namespace MedcinBundle\Controller;

use MedcinBundle\Entity\Enfant;
use MedcinBundle\Form\EnfantType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Dompdf\Dompdf;
use Dompdf\Options;

class EnfantController extends Controller
{
    public function createAction(Request $request)
    {
        //creation objet vide
        $enfant = new Enfant();
        // creer notre formulaire
        $form=$this->createForm(EnfantType::class ,$enfant);
        //recuperation de donnes
        $form=$form->handleRequest($request);
        //test sur les donnees
        if($form->isValid()&&$form->isSubmitted())
        {
            //creation d un objet doctrine
            $em=$this->getDoctrine()->getManager();
            //persister les donnees dans ORM
            $em->persist($enfant);
            //sauvegarder les donnees dans BD
            $em->flush();
            return $this->redirectToRoute('read_enfant');
        }
        // envoyer ce formulaire à l utilisateur
        return $this->render('@Medcin/Enfant/create.html.twig', array(
            'form'=>$form->createView()
        ));
    }

    public function readAction(Request $request)
    {
        //Creer un objet Doctrine
        $em=$this->getDoctrine();
        $tab=$em->getRepository(Enfant::class)->findAll();

        /**
         * @var $pagination \Knp\Component\Pager\Paginator
         */
        $paginator=$this->get('knp_paginator');
        $result=$paginator->paginate($tab,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',10));
        return $this->render('@Medcin/Enfant/read.html.twig', array(
            'consul'=>$result
        ));
    }

    public function updateAction(Request $request,$id)
    {
        //recuperation de l objet selon l ID envoyer par user
        //em stands for entity manager
        $em=$this->getDoctrine()->getManager();

        $enfant=$em->getRepository(Enfant::class)->find($id);
        // creer notre formulaire
        $form=$this->createForm(EnfantType::class,$enfant);
        //recuperation de donnes
        $form=$form->handleRequest($request);
        //test sur les donnees
        if($form->isValid())
        {
            //creation d un objet doctrine
            //$em=$this->getDoctrine()->getManager();

            //sauvegarder les donnees dans BD
            $em->persist($enfant);
            $em->flush();
            return $this->redirectToRoute('read_enfant');
        }
        // envoyer ce formulaire à l utilisateur
        return $this->render('@Medcin/Enfant/update.html.twig', array(
            'form'=>$form->createView()
        ));
    }

    public function deleteAction($id)
    {
        $em=$this->getDoctrine()->getManager();

        $enfant=$em->getRepository(Enfant::class)->find($id);
        $em->remove($enfant);
        $em->flush();
        return $this->redirectToRoute('read_enfant');
    }

    public function searchAction(Request $request)
    {
        $em=$this->getDoctrine();
        $input=$request->get('nom');
        $tab=$em->getRepository(Enfant::class)->findAll();
        if(isset($input) & !empty($input))
        {$titre=$request->get('nom');
            $tab=$em->getRepository(Enfant::class)->searchTitre($input);
        }

        return $this->render('@Medcin/Enfant/search.html.twig', array(
            'consul'=>$tab
        ));
    }

    public function pdfAction(Request $request)
    {
        $pdfOptions= new Options();
        $pdfOptions->set('defaultFont','Arial');

        $dompdf = new Dompdf($pdfOptions);

        $em=$this->getDoctrine()->getManager();
       // $inventaire=$em->getRepository(InventaireC::class)->find($id);
        $tab=$em->getRepository(Enfant::class)->findAll();

        $html= $this->renderView('@Medcin/Enfant/pdf.html.twig', array(
            "consul"=>$tab
        ));

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4','portrait');
        $dompdf->render();
        $output=$dompdf->output();

        //$nom=$inventaire->getPartenaire()->getNom();
        $path='C:\Users\yanisinfo\Desktop\junior/Enfant.pdf';

        $pdfFilePath=$path;

        file_put_contents($pdfFilePath,$output);

        return $this->redirectToRoute("read_enfant");

    }

}
