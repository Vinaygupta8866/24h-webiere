<?php

namespace EL\AppBundle\Controller;

use EL\AppBundle\Entity\Biere;
use EL\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AppController extends Controller
{
    public function indexAction()
    {
        $repoBiere = $this->getDoctrine()->getManager()->getRepository('ELAppBundle:Biere');
        $bieres = $repoBiere->findAll();
        $user = new User();
        $user = $this->getUser();

        if($user != null) {
            $user->setBiereFavorite(null);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
        }



        return $this->render('ELAppBundle:App:index.html.twig', array(
            'user'   => $user,
            'bieres' => $bieres));
    }
}
