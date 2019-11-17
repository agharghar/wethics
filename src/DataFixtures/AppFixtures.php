<?php

namespace App\DataFixtures;

use App\Entity\Role;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;



class AppFixtures extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

// ...
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail("admin@admin.com");

        $password = $this->encoder->encodePassword($user, 'admin');
        $user->setPassword($password);
        $user->setNom("admin");
        $user->setPrenom("admin");
        $user->setDateNaissance(new \DateTime("15-05-2000"));
        $user->setTel("54554");

        $role = new Role();
        $role->setRole("ADMIN");
        $user->setRoles($role);

        $manager->persist($role);
        $manager->persist($user);
        $manager->flush();
    }
}
