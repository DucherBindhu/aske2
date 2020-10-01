<?php

namespace App\DataFixtures;

use App\Entity\Newletter;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class NewletterFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
    $newletter = new Newletter();
    $newletter->setEmail('aske@gmail.com');
    $manager->persist($newletter);
        $manager->flush();
    }
}
