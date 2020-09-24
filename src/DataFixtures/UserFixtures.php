<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;
    public  function __construct(UserPasswordEncoderInterface $passwordEncoder){
        $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager)
    {
        $data = ["emails" => ["user@gmail.com", "admin@gmail.com"],
                "passwords" => ["pass1","pass2"],
                "roles" => ["ROLE_USER","ROLE_ADMIN"]


        ];
        //
        for($i=0;$i<2;$i++){
            $user = new User();
            $user->setEmail($data["emails"][$i]);
            $user->setPassword($this->passwordEncoder->encodePassword($user,$data["passwords"][$i]));
            $user->setRoles([$data["roles"][$i]]);
            $manager->persist($user);

        }
        $manager->flush();
        }
    }







