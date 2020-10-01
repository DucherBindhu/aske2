<?php

namespace App\DataFixtures;

use App\Entity\Juges;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class JugesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {


            $juges1 = new Juges();
            $juges1->SetLastname('GUERY');
            $juges1->setFirstname('PASCAL');
            $juges1->setDescription('63 ans. Acquisition de mon premier malinois en 1978 et engagement dans la cynophilie
             auprès de diverses instances (secrétaire puis trésorière d’un club d’éducation canine, secrétaire de l’Association Canine
             Territoriale de la Beauce puis membre du comité de celle de la Dordogne).');
            $juges1->setImage('images/GERY.jpg');

        $manager->persist($juges1);


        $juges2= new Juges();
        $juges2->SetLastname('SEMKAT');
        $juges2->setFirstname('MARIAM');
        $juges2->setDescription('Elle a commencé à juger en 1987, et a eu l’honneur d’être choisie 
        pour attribuer les premiers Challenge Certificates à la race Épagneul Breton à Crufts en 1997. 
        Elle est également autorisée à attribuer des Challenge Certificates à 25 races du Gundog Group (groupes 7 et 8 de la FCI).
         Elle juge aussi les Groups 7 et 8 aux expositions de championnat.
        En 2009, elle a eu l’honneur de juger les Chiens d’Eau Irlandais à Crufts, puis des Welsh Springer Spaniels à Crufts en 2013.');
        $juges2->setImage('images/SEMKAT.jpg');
        $manager->persist($juges2);


        $juges3 = new Juges();
        $juges3->SetLastname('DELACOUR');
        $juges3->setFirstname('JEAN-MICHEL');
        $juges3->setDescription('Depuis 1991, je suis membre du C.I.M. – Club Italien de Molossoïdes, et depuis 2006,
         je suis le Président du même club. Je suis membre de l’ENCI et du Groupe Cinofilo Partenopeo depuis 1977,
          Commissaire de Ring depuis 1996, délégué de l’ENCI depuis 2004, juge spécialiste du Mastiff Tibétain depuis 2006..');
        $juges3->setImage('images/DELACOUR.jpg');


        $manager->persist($juges3);


            $manager->flush();


        }

}