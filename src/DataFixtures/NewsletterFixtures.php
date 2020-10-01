<?php

namespace App\DataFixtures;

use App\Entity\Newsletter;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class NewsletterFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $newsletter = new Newsletter();
        $newsletter->setEmail('aske@gmail.com');
        $manager->persist($newsletter);

        $manager->flush();
    }
}
