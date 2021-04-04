<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    private array $list_users = [
        [
            'username' => 'admin',
            'password' => '$argon2id$v=19$m=65536,t=4,p=1$YkNOQmtmOVhScXJFTGdwdA$6FvcQAU6nzSnJONXtlTA+cpG5fQ5acN/M1DB6yYwK10',
            'roles' => ['ROLE_ADMIN']
        ],
        [
            'username' => 'user',
            'password' => '$argon2id$v=19$m=65536,t=4,p=1$RTcyOUpXRHlmc1pHVlNhUQ$nGV5hfUEgmdKSvT8QzKKztRLA9B31px/zjrjEl+94eQ',
            'roles' => ['ROLE_USER']
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
