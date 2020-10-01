<?php

namespace App\DataFixtures;

use App\Entity\Evenement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EvenementFixtures extends Fixture
{
    const DATA = [
        [
            'titre' => 'BEMMEL',
            'date' =>'15/08/2013',
            'image'=> 'images/1_BEMMEL_Nederland2013.png'
        ],
        [
            'titre' => 'BEMMEL',
            'date' =>'15/08/2014',
            'image' => 'images/2_BEMMEL_Nederland2014.png'
        ],
        [
            'titre' => 'BEMMEL',
            'date' =>'15/08/2015',
            'image'=> 'images/3_BEMMEL_Nederland2015.png'
        ],
        [
            'titre' => 'BEMMEL',
            'date' =>'15/08/2016',
            'image'=> 'images/4_BEMMEL_Nederland2016.png'
        ],
        [
            'titre' => 'BEMMEL',
            'date' =>'15/08/2017',
            'image'=> 'images/5_BEMMEL_Nederland2017.png'
        ],
        [
            'titre' => 'SAARBURG',
            'date' =>'15/08/2018',
            'image'=> 'images/6_SAARBURG_Allemagne2018.png'
        ],
        [
            'titre' => 'ROTTERDAM',
            'date' =>'15/08/2005',
            'image'=> 'images/7_ROTTERDAM_Nederland2019.jpg'
        ],
    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::DATA as $data) {
            $evenement = new Evenement();
            $evenement->setTitre($data['titre']);
            $evenement->setDescription('Bienvenue sur le evenement');
            $evenement->setDate(\DateTime::createFromFormat('d/m/Y', $data['date']));
            $evenement->setImage($data['image']);

            $manager->persist($evenement);
        }


        $manager->flush();
    }
}
