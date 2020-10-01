<?php

namespace App\Controller;

use App\Entity\Competitor;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CompetitorController extends AbstractController
{
    /**
     * @Route("/competitor", name="competitor")
     */
    public function index()
    {
        return $this->render('competitor/index.html.twig', [
            'competitor' => 'Competitor',
        ]);
    }
}
