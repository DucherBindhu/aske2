<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Form\EvenementType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EvenementController extends AbstractController
{
    /**
     * @Route("/evenement", name="evenement")
     */
    public function index(Evenement $evenement)
    {
        return $this->render('evenement/index.html.twig', [
            'evenement' => $evenement,
        ]);
    }
    /**
     * @Route("/evenement/form", name="evenement_form")
     */
    public function newsletterForm(Request $request,EntityManagerInterface $manager,Evenement $evenement= null)
    {
        if ($evenement === null) {
            $evenement = new Evenement();
        }

        $evenementForm = $this->createForm(EvenementType::class, $evenement);

        $evenementForm->handleRequest($request);

        if ($evenementForm->isSubmitted() && $evenementForm->isValid()) {
            $manager->persist($evenement);
            $manager->flush();

        }

        return $this->render('evenement/index.html.twig', [
            'evenement_form' => $evenementForm->createView(),
            'evenement' => $evenementForm
        ]);
    }

}
