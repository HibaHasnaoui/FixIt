<?php

namespace DisponibiliteBundle\Controller;

use DisponibiliteBundle\Entity\Disponibilite;
use DisponibiliteBundle\Form\DisponibiliteType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DisponibiliteController extends Controller
{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $disponibilites = $em->getRepository('DisponibiliteBundle:Disponibilite')->findAll();

        return $this->render('@Disponibilite/disponibilite/getAll.html.twig', array(
            'disponibilites' => $disponibilites,
        ));
    }

    public function modifierAction(Request $request,$id)
    {        $em = $this->getDoctrine()->getManager();

        $dispo = $em->getRepository('DisponibiliteBundle:Disponibilite')->find($id);

        $Form = $this->createForm(DisponibiliteType::class, $dispo);
        $Form->handleRequest($request);

        if ($Form->isValid() && $Form->isSubmitted()) {
            $em->persist($dispo);
            $em->flush();
            return $this->redirectToRoute('disponibilite_index');

        }
        return $this->render('@Disponibilite/disponibilite/modifier.html.twig', array(
            'form'=>$Form->createView()
        ));
    }

    public function showAction(Disponibilite $disponibilite)
    {

        return $this->render('@Disponibilite/disponibilite/Consulter.html.twig', array(
            'disponibilite' => $disponibilite,
        ));
    }

    public function showByIdAction($id )
    {
        $em = $this->getDoctrine()->getManager();

        $disponibilite = $em->getRepository('DisponibiliteBundle:Disponibilite')->find($id);


        return $this->render('@Disponibilite/disponibilite/Consulter.html.twig', array(
            'disponibilite' => $disponibilite,
        ));
    }

    public function supprimerAction($id)
    {
        $em = $this->getDoctrine()->getManager();


        $dispo = $em->getRepository('DisponibiliteBundle:Disponibilite')->find($id);
        $em->remove($dispo);
        $em->flush();

        return $this->redirectToRoute('disponibilite_index');


    }

    public function ajouterAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $dispo = new Disponibilite();
        $Form = $this->createForm(DisponibiliteType::class, $dispo);
        $Form->handleRequest($request);


        if ($Form->isValid() && $Form->isSubmitted()) {

                $user = $this->container->get('security.token_storage')->getToken()->getUser()->getId();
                $user = $em->getRepository('UserBundle:User')->find($user);

                $dispo->setTec($user);
                $em->persist($dispo);
                                $user->setDisponibilite($dispo);
            $em->merge($user);

                $em->flush();
            return $this->redirectToRoute('disponibilite_index');

        }
            return $this->render('@Disponibilite/disponibilite/ajouter.html.twig', array(
                'form'=>$Form->createView()
        ));

    }




}
