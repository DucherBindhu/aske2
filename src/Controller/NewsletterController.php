<?php

namespace App\Controller;

use App\Entity\Newsletter;
use App\Form\NewsletterType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class NewsletterController extends AbstractController
{
    /**
     * @Route("/newsletter", name="newsletter")
     */
    public function index(Newsletter $newsletter)
    {
        return $this->render('newsletter/index.html.twig', [
            'newsletter' => $newsletter,
        ]);
    }
    /**
     * @Route ("/newsletter/form", name="newsletter")
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     */
    public function newsletterForm(Request $request,EntityManagerInterface $manager,Newsletter $newsletter= null)
    {
        if ($newsletter === null) {
            $newsletter = new Newsletter();
        }

        $newsletterForm = $this->createForm(NewsletterType::class, $newsletter);

        $newsletterForm->handleRequest($request);

        if ($newsletterForm->isSubmitted() && $newsletterForm->isValid()) {
            $manager->persist($newsletter);
            $manager->flush();
            return $this->redirectToRoute('home');
        }

        return $this->render('newsletter/index.html.twig', [
            'newsletter_form' => $newsletterForm->createView(),
            'newsletter' => $newsletter
        ]);
    }
}
