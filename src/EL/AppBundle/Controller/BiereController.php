<?php

namespace EL\AppBundle\Controller;

use EL\AppBundle\Entity\Biere;
use EL\AppBundle\Form\BiereType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BiereController extends Controller
{
    public function viewAction($id)
    {
        $biere = new Biere();

        $em = $this->getDoctrine()->getManager();
        $biere = $em->find('ELAppBundle:Biere', $id);

        if (null === $biere) {
            throw new NotFoundHttpException("La biere d'id " . $id . " n'existe pas.");
        }

        return $this->render('ELAppBundle:Biere:view.html.twig', array('biere' => $biere));

    }

    public function editAction($id, Request $request)
    {
        $biere = new Biere();
        $em = $this->getDoctrine()->getManager();
        $biere = $em->find('ELAppBundle:Biere', $id);
        if (null === $biere) {
            throw new NotFoundHttpException("La biere d'id " . $id . " n'existe pas.");
        }
        $form = $this->get('form.factory')->create(BiereType::class, $biere);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($biere);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Biere modifié.');

            return $this->redirectToRoute('el_app_biere_view', array('id' => $biere->getId()));
        }

        return $this->render('ELAppBundle:Biere:edit.html.twig', array('form' => $form->createView(),));
    }

    public function addAction(Request $request)
    {
        $biere = new Biere();
        $form = $this->get('form.factory')->create(BiereType::class, $biere);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($biere);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Biere enregistrée.');

            return $this->redirectToRoute('el_app_biere_view', array('id' => $biere->getId()));
        }

        return $this->render('ELAppBundle:Biere:add.html.twig', array('form' => $form->createView(),));
    }
}
