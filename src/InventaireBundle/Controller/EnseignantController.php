<?php

namespace InventaireBundle\Controller;

use InventaireBundle\Entity\Enseignant;
use InventaireBundle\Entity\Salaire;
use InventaireBundle\Form\EnseignantType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;

class EnseignantController extends Controller
{
    public function readAction()
    {

       $em=$this->getDoctrine()->getManager();
       $tab=$em->getRepository(Enseignant::class)->findAll();

        $montantTotal=0;
        foreach ($tab as $row)
        {
            $montantTotal+=$row->getSalaire()->getChiffre();

        }

        $data= array();
        $stat=['Enseignant','Salaire'];
        $nb=0;
        array_push($data,$stat);
        foreach ($tab as $row)
        {
            $stat=array();


            array_push($stat,$row->getNom(),$row->getSalaire()->getChiffre());

            $nb=$row->getSalaire()->getChiffre();

            $stat=[$row->getNom()." ".$row->getPrenom(),$nb];
            array_push($data,$stat);
        }

        $pieChart = new PieChart();
        $pieChart->getData()->setArrayToDataTable($data);
        $pieChart->getOptions()->setTitle('Montant à payer par chaque partenaire');
        $pieChart->getOptions()->setHeight(500);
        $pieChart->getOptions()->setWidth(1125);
        $pieChart->getOptions()->getTitleTextStyle()->setBold(true);
        $pieChart->getOptions()->getTitleTextStyle()->setColor('#f47684');
        $pieChart->getOptions()->getTitleTextStyle()->setItalic(true);
        $pieChart->getOptions()->getTitleTextStyle()->setFontName('Arial');
        $pieChart->getOptions()->getTitleTextStyle()->setFontSize(20);



        return $this->render('@Inventaire/Enseignant/read.html.twig', array(
            'Enseignant'=>$tab,'pieChart'=>$pieChart
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
            $basic  = new \Nexmo\Client\Credentials\Basic('372d5729', 'n3FnzJypbJxuwj5G');
          /*  $client = new \Nexmo\Client($basic);

            $message = $client->message()->send([
                'to' => '21626899579',
                'from' => 'Junior',
                'text' => 'Hello from junior,'
            ]); */
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

    public function updateAction($id,Request $request)
    {
        //recuperation de l objet selon l ID envoyer par user
        //em stands for entity manager
        $em=$this->getDoctrine()->getManager();

        $Enseignant=$em->getRepository(Enseignant::class)->find($id);
        //$Enseignant->setSalaire(new Salaire());
        // creer notre formulaire
        $form=$this->createForm(EnseignantType::class,$Enseignant);
        //recuperation de donnes
        $form=$form->handleRequest($request);
        //test sur les donnees
        if($form->isValid())
        {
            //creation d un objet doctrine
            //$em=$this->getDoctrine()->getManager();

            //sauvegarder les donnees dans BD
            $em->flush();
            return $this->redirectToRoute('read_enseignant');
        }


        // envoyer ce formulaire à l utilisateur
        return $this->render('@Inventaire/Enseignant/update.html.twig', array(
            'form'=>$form->createView()));
    }


}
