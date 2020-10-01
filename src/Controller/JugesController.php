<?php

namespace App\Controller;

use App\Entity\Juges;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class JugesController extends AbstractController
{
    /**
     * @Route("/juges", name="juges")
     */
    public function index(Juges $juges)
    {
        return $this->render('juges/index.html.twig', [
            'juges' => $juges,
        ]);
    }
}
