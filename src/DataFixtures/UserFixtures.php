<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    private array $list_users = [
        [
            'username' => 'visiteur',
            'password' => '$argon2id$v=19$m=65536,t=4,p=1$QTdEMUJxSmJXNFlJVXAueA$g0x5BrlJ/ZvxYATTkT/VPGl15s3XCqC2dEm9A3etrwk',
            'roles' => ['ROLE_VISITEUR']
        ]
    ];

    public function load(ObjectManager $manager)
    {
        foreach($this -> list_users as $user){
            $entity = new User();
            $entity
                ->setUsername($user['username'])
                ->setPassword($user['password'])
                ->setRoles($user['roles']);

            $manager->persist($entity);
        }
        $manager->flush();
    }
}
