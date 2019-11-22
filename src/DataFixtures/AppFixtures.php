<?php

namespace App\DataFixtures;


use App\Entity\EfficaciteCO;
use App\Entity\EfficaciteME;
use App\Entity\ModelesDeSoins;
use App\Entity\ObjectifsEthics;
use App\Entity\Opinion;
use App\Entity\ContextesDeSoin;

use App\Entity\MethodesEvaluation;

use App\Entity\ObjectifsDeSoin;

use App\Entity\Probleme;
use App\Entity\Role;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class AppFixtures extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }


    public function load(ObjectManager $manager)
    {


        $faker = Factory::create('us_US');
        $populator = new \Faker\ORM\Doctrine\Populator($faker, $manager);


        $role = new Role();
        $role1 = new Role();
        $role2 = new Role();
        $role->setRole("ADMIN");
        $role1->setRole("USER");
        $role2->setRole("PRO");


        $manager->persist($role);
        $manager->persist($role1);
        $manager->persist($role2);
        $manager->flush();



        $this->efficacite($manager,$faker);

                $this->opinions($manager,$faker,$populator);


                  $this->ethics($populator);



                       $user = new User();
                       $user->setEmail("admin@admin.com");

                       $password = $this->encoder->encodePassword($user, 'a');
                       $user->setPasswod($password);
                       $user->setPseudo($faker->lastName);
                       $user->setDateInscription($faker->dateTime());
                       $user->setRoles($role);

                       $manager->persist($user);
                       $manager->flush();













                       $this->probleme($populator,$manager);



                          $opinion = $manager->getRepository(opinion::class)->findAll();
                          $efficaciteCO = $manager->getRepository(EfficaciteCO::class)->findAll();
                          $efficaciteme = $manager->getRepository(EfficaciteME::class)->findAll();
                          $probleme =$manager->getRepository(Probleme::class)->findAll() ;
                          $ethics1 =  $manager->getRepository(ObjectifsEthics::class)->findAll() ;
                          $ethics2 =  $manager->getRepository(ObjectifsDeSoin::class)->findAll() ;
                          $ethics =  $manager->getRepository(MethodesEvaluation::class)->findAll() ;
                          $ethics3 =  $manager->getRepository(ModelesDeSoins::class)->findAll() ;
                          $ethics4=  $manager->getRepository(ContextesDeSoin::class)->findAll() ;
                          $opinion=  $manager->getRepository(Opinion::class)->findAll() ;



                          $roles=  $manager->getRepository(Role::class)->findAll() ;


                              for ($x = 0; $x < 50; $x++) {


                                  $user = new User();
                                  $user->setEmail($faker->email);

                                  $password = $this->encoder->encodePassword($user, $faker->text(50));
                                  $user->setPasswod($password);
                                  $user->setPseudo($faker->unique()->lastName);

                                  $user->setDateInscription($faker->dateTime());
                                  $user->setRoles( $roles[$x%3]);
                                  $user->addEfficaciteCO($efficaciteCO[$x]);
                                  $user->addEfficaciteME($efficaciteme[$x]);
                                  $user->addOpinion($opinion[$x]);
                                  $user->addProbleme($probleme[$x]);

                                  $manager->persist($user);
                                  $manager->flush();


                              }


                                        for ($x = 0; $x < 50; $x++) {

                                            $ethics[$x]->setProbleme($probleme[$x]);
                                            $ethics1[$x]->setProbleme($probleme[$x]);
                                            $ethics2[$x]->setProbleme($probleme[$x]);
                                            $ethics3[$x]->setProbleme($probleme[$x]);
                                            $ethics4[$x]->setProbleme($probleme[$x]);
                                            $opinion[$x]->setProbleme($probleme[$x]);
                                            $efficaciteCO[$x]->setOpinion($opinion[$x]);
                                            $efficaciteme[$x]->setOpinion($opinion[$x]);

                                            $manager->persist($ethics[$x]);
                                            $manager->persist($ethics1[$x]);
                                            $manager->persist($ethics2[$x]);
                                            $manager->persist($ethics3[$x]);
                                            $manager->persist($ethics4[$x]);
                                            $manager->flush();
                                        }



    }


    public function efficacite(ObjectManager $manager,$faker)
    {


        $populator = new \Faker\ORM\Doctrine\Populator($faker, $manager);
        $populator->addEntity(\App\Entity\EfficaciteME::class, 50,$customColumnFormatters = array(
            'risque' =>  function() {return random_int(0,100) ;},
            'benefice' =>  function() { return random_int(0,100); })

        );


        $populator->addEntity(\App\Entity\EfficaciteCO::class, 50,$customColumnFormatters = array(
            'risque' =>  function() {return random_int(0,100) ;},
            'benefice' =>  function() { return random_int(0,100); })

        );

        $populator->execute();

    }



    public function ethics($populator)
    {


        $populator->addEntity(ObjectifsEthics::class, 50);
        $populator->addEntity(ModelesDeSoins::class, 50);
        $populator->addEntity(ContextesDeSoin::class, 50);
        $populator->addEntity(MethodesEvaluation::class, 50);
        $populator->addEntity(ObjectifsDeSoin::class, 50);



        $populator->execute();
    }

    public function opinions(ObjectManager $manager,$faker,$populator){


        $efficaciteCO = $manager->getRepository(EfficaciteCO::class)->findAll();
        $efficacitemes = $manager->getRepository(EfficaciteME::class)->findAll();




        for ($x = 0; $x < 50; $x++) {

            $populator->addEntity(opinion::class, 1, $customColumnFormatters = array(
                'moyenne_benefice' => function () { return random_int(15, 75);},
                'moyenne_risque' => function () {return random_int(15, 60);},
                'efficacitecos' => [$efficaciteCO[$x] ],
                'efficacitemes' => [$efficacitemes[$x]])
            );


            $populator->execute();
        }


    }


    public function probleme($populator,$manager){

        $opinions = $manager->getRepository(opinion::class)->findAll();


        for ($x = 0; $x < 50; $x++) {

            $populator->addEntity(Probleme::class, 1,$customColumnFormatters = array(
                'opinions' => [$opinions[$x]]    ,

            )
            );
            $populator->execute();
        }

    }



}
