<?php

namespace DisponibiliteBundle\Controller;

use DisponibiliteBundle\Entity\Mission;
use DisponibiliteBundle\Form\MissionType;
use DisponibiliteBundle\Form\MissionType1;
use DisponibiliteBundle\Form\MissionType2;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;



class MissionController extends Controller
{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $missions = $em->getRepository('DisponibiliteBundle:Mission')->findAll();

        return $this->render('@Disponibilite/mission/index.html.twig', array(
            'missions' => $missions,
        ));
    }




    public function showAction(Mission $mission)
    {

        return $this->render('@Disponibilite/mission/show.html.twig', array(
            'mission' => $mission,
        ));
    }



    public function supprimerAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $mission = $em->getRepository('DisponibiliteBundle:Mission')->find($id);

        $em->remove($mission);
        $em->flush();

        return $this->redirectToRoute('mission_index');

    }




    public function modifierAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $mission = $em->getRepository('DisponibiliteBundle:Mission')->find($id);
        $Form = $this->createForm(MissionType::class, $mission);
        $Form->handleRequest($request);

        if ($Form->isValid() && $Form->isSubmitted()) {
            $em->persist($mission);
            $em->flush();
            return $this->redirectToRoute('mission_index');

        }
        return $this->render('@Disponibilite/mission/modifier.html.twig', array(
            'form'=>$Form->createView()
        ));
    }
    public function ajouterAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $mission = new Mission();
        $Form = $this->createForm(MissionType::class, $mission);
        $Form->handleRequest($request);

        if ($Form->isValid() && $Form->isSubmitted()) {
            $em->persist($mission);
            $em->flush();
            return $this->redirectToRoute('mission_index');

        }
        return $this->render('@Disponibilite/mission/ajouter.html.twig', array(
            'form'=>$Form->createView()
        ));
    }




}
