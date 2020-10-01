<?php

namespace App\DataFixtures;

use App\Entity\Competitor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CompetitorFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $competitor = new Competitor();
        $competitor->setDescription('It is a long established fact that a reader');
        $manager->persist($competitor);
        $manager->flush();
    }
}
