<?php

namespace App\Controller;


use App\Entity\Newletter;
use App\Form\NewletterFormType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class NewletterController extends AbstractController
{
    /**
     * @Route("/newletter", name="newletter")
     */
    public function index(Newletter $newletter)
    {
        return $this->render('newletter/index.html.twig', [
            'controller_name' => 'NewletterController',
        ]);
    }

    /**
     * @Route("/newletter/form", name="newletter")
     */
    public function newletterForm(Request $request, EntityManagerInterface $manager, Newletter $newletter = null)
    {
        if ($newletter === null) {
            $newletter = new Newletter();
        }

        $newletterForm = $this->createForm(NewletterFormType::class, $newletter);

        $newletterForm->handleRequest($request);



        if ($newletterForm->isSubmitted() && $newletterForm->isValid()) {
            $manager->persist($newletter);
            $manager->flush();
        }
        return $this->render('newletter/index.html.twig', [
            'newletter_form' => $newletterForm->createView(),
            "newletter" => $newletter
        ]);
    }
}