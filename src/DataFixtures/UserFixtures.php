<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $list_users = [
            [
                'username' => 'visiteur',
                'roles' => ['ROLE_VISITEUR'],
                'password' => '$argon2id$v=19$m=65536,t=4,p=1$QTdEMUJxSmJXNFlJVXAueA$g0x5BrlJ/ZvxYATTkT/VPGl15s3XCqC2dEm9A3etrwk',
                'nom' => 'visiteur',
                'prenom' => 'visiteur',
                'adresse' => '10 rue Visiteur',
                'code_postal' => '92100',
                'ville' => 'Boulogne-Billancourt',
                'date_embauche' =>  new DateTime('1990-01-01 00:00:00'),
            ]
        ];

        foreach($list_users as $user){
            $entity = new User();
            $entity
                ->setUsername($user['username'])
                ->setRoles($user['roles'])
                ->setPassword($user['password'])
                ->setNom($user['nom'])
                ->setPrenom($user['prenom'])
                ->setAdresse($user['adresse'])
                ->setCodePostal($user['code_postal'])
                ->setVille($user['ville'])
                ->setDateEmbauche($user['date_embauche']);

            $manager->persist($entity);
        }
        $manager->flush();
    }
}
