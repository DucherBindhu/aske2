<?php

namespace App\Controller;

use App\Entity\Chien;
use App\Form\ChienType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ChienController extends AbstractController
{
    /**
     * @Route("/chien", name="chien")
     */
    public function index(Chien $chien)
    {
        return $this->render('chien/index.html.twig', [
            'chien' => $chien,
        ]);
    }
    /**
     * @Route("/chien/form", name="chien")
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     */


    public function chienForm(Request $request,EntityManagerInterface $manager,Chien $chien = null)
    {
        if ($chien === null) {
            $chien = new Chien();
        }

        $chienForm = $this->createForm(ChienType::class, $chien);

        $chienForm->handleRequest($request);

        if ($chienForm->isSubmitted() && $chienForm->isValid()) {
            $manager->persist($chien);
            $manager->flush();

        }

        return $this->render('chien/index.html.twig', [
            'chien_form' => $chienForm->createView(),
            'chien' => $chien
        ]);
    }
}
