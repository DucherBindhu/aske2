<?php

namespace App\DataFixtures;

use App\Entity\Repas;
use App\Form\RepasType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RepasFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i<5; $i++){
            $repas = new Repas();
            $repas->setPrenom('Grey');
            $repas->setNom('Paul');
            $repas->setParticipant('2');
            $repas->setMenu([array_values(RepasType::MENUS)[random_int(0,2)]]);
            $manager->persist($repas);
        }
        $manager->flush();
    }
}
