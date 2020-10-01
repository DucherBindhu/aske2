<?php

namespace App\Controller;

use App\Form\NewsletterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
        $newsletterForm = $this->createForm(NewsletterType::class);
        return $this->render('home/home.html.twig', [
            'controller_name' => 'aske',
            'form_newsletter' => $newsletterForm->createView()
        ]);
    }
}
