<?php

namespace ReclamationBundle\Controller;

use ReclamationBundle\Entity\Reclamations;
use ReclamationBundle\Entity\Reponse;
use ReclamationBundle\Form\ReponseType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ReponseController extends Controller
{
    public function createAction($id,Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $reclamation=$em->getRepository(Reclamations::class)->find($id);

        $reponse=new Reponse();
        $form=$this->createForm(ReponseType::class,$reponse);
        $form=$form->handleRequest($request);
        if($form->isValid())
        {
            $reclamation->setReponse($reponse);
            $em->persist($reponse);
            $em->persist($reclamation);
            $em->flush();
            return $this->redirectToRoute('reclamation_read');
        }

        return $this->render('@Reclamation/Reponse/create.html.twig', array(
            'form'=>$form->createView()
        ));



    }

    public function readAction($id)
    {
        $em=$this->getDoctrine();
        $reponse=$em->getRepository(Reponse::class)->find($id);
        return $this->render('@Reclamation/Reponse/read.html.twig', array(
            'i'=>$reponse
        ));

    }


    public function deleteAction($id)
    {
        $em=$this->getDoctrine()->getManager();

        $reponse=$em->getRepository(Reponse::class)->find($id);
        $array=$em->getRepository(Reclamations::class)->findReclamation($id);
        $reclamation=$array[0];
        $reclamation->setReponse(NULL);
        $em->persist($reclamation);
        $em->remove($reponse);
        $em->flush();
        return $this->redirectToRoute('reclamation_read');
    }


    public function  updateAction($id,Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $reponse=$em->getRepository(Reponse::class)->find($id);
        $form=$this->createForm(ReponseType::class,$reponse);
        $form=$form->handleRequest($request);
        if($form->isValid())
        {

            $em->persist($reponse);

            $em->flush();
            return $this->redirectToRoute('reclamation_read');
        }


        return $this->render('@Reclamation/Reponse/update.html.twig', array(
            'form'=>$form->createView()
        ));




    }

}
