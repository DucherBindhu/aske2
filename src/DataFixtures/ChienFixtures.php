<?php

namespace App\DataFixtures;

use App\Entity\Chien;
use App\Form\ChienType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ChienFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i<5; $i++) {
            $chien = new Chien();
            $chien->setPrenom('chien');
            $chien->setRace('race');
            $chien->setLicence('123');
            $chien->setEpreuve([array_values(ChienType::EPREUVES)[random_int(0,2)]]);
            $chien->setCategory(array_values(ChienType::CATEGORIES)[random_int(0,2)]);
            $manager->persist($chien);
        }

        $manager->flush();
    }
}
