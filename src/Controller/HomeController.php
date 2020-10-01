<?php

namespace App\Controller;

use App\Repository\EvenementRepository;
use App\Form\NewsletterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(EvenementRepository $evenementRepository)
    {
        $evenement = $evenementRepository->findAll();
        $newsletterForm = $this->createForm(NewsletterType::class);
        return $this->render('home/home.html.twig', [
            'controller_name' => 'aske',
            'evenement' =>$evenement,
            'form_newsletter' => $newsletterForm->createView()
        ]);
    }
}
