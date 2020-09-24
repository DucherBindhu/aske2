<?php

namespace App\Controller;

use App\Entity\Chien;
use App\Form\ChienType;
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
     */


    public function chienForm(Request $request, Chien $chien = null)
    {
        if ($chien === null) {
            $chien = new Chien();
        }

        $chienForm = $this->createForm(ChienType::class, $chien);

        $chienForm->handleRequest($request);

        if ($chienForm->isSubmitted() && $chienForm->isValid()) {

        }
        return $this->render('chien/index.html.twig', [
            'chien_form' => $chienForm->createView(),
            'chien' => $chien
        ]);
    }
}
