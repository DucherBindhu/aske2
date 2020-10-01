<?php

namespace App\Controller;

use App\Entity\Repas;
use App\Form\RepasType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RepasController extends AbstractController
{
    /**
     * @Route("/repas", name="repas")
     */
    public function index(Repas $repas)
    {
        return $this->render('repas/index.html.twig', [
            'repas' => $repas,
        ]);
    }

    /**
     * @Route ("/repas/form", name="repas")
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     */
    public function chienForm(Request $request,EntityManagerInterface $manager,Repas $repas= null)
    {
        if ($repas === null) {
            $repas = new Repas();
        }

        $repasForm = $this->createForm(RepasType::class, $repas);

        $repasForm->handleRequest($request);

        if ($repasForm->isSubmitted() && $repasForm->isValid()) {
            $manager->persist($repas);
            $manager->flush();

        }

        return $this->render('repas/index.html.twig', [
            'repas_form' => $repasForm->createView(),
            'repas' => $repas
        ]);
    }
}
