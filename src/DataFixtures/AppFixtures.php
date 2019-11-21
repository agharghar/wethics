<?php

namespace App\DataFixtures;


use App\Entity\Commentaire;
use App\Entity\ContextesDeSoin;
use App\Entity\Documents;
use App\Entity\MethodesEvaluation;
use App\Entity\ModelesDeSoin;
use App\Entity\ObjectifsDeSoin;
use App\Entity\ObjectifsEthiques;
use App\Entity\Post;
use App\Entity\Professionel;
use App\Entity\RatingUser;
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

        /*
         * set user role
         * */
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
        /*************/


        /*
         * rating user
         * */
        $this->ratingUser($manager,$faker);

        $this->commentaires($manager,$faker,$populator);
        /*
         * ethics
         *
         */

        $this->ethics($populator);


        /*documents*/
        $this->documents($populator);


        $user = new User();
        $user->setEmail("admin@admin.com");

        $password = $this->encoder->encodePassword($user, 'a');
        $user->setPassword($password);
        $user->setNom("admin");
        $user->setPrenom("admin");
        $user->setDateNaissance($faker->dateTime());
        $user->setTel($faker->phoneNumber);
        $user->setDateInscription($faker->dateTime());
        $user->setRoles($role);

        $manager->persist($user);
        $manager->flush();












        /*post*/
        $this->posts($populator,$manager);

    /*professionel */
        $this->professionels($populator,$manager);



        $commentaires = $manager->getRepository(Commentaire::class)->findAll();
        $ratingUser = $manager->getRepository(RatingUser::class)->findAll();
        $posts =$manager->getRepository(Post::class)->findAll() ;
        $ethics =  $manager->getRepository(MethodesEvaluation::class)->findAll() ;
        $ethics1 =  $manager->getRepository(ObjectifsEthiques::class)->findAll() ;
        $ethics2 =  $manager->getRepository(ObjectifsDeSoin::class)->findAll() ;
        $ethics3 =  $manager->getRepository(ModelesDeSoin::class)->findAll() ;
        $ethics4=  $manager->getRepository(ContextesDeSoin::class)->findAll() ;
        $doc=  $manager->getRepository(Documents::class)->findAll() ;
        $pro=  $manager->getRepository(Professionel::class)->findAll() ;
        $roles=  $manager->getRepository(Role::class)->findAll() ;


        /*add 50 users */
        for ($x = 0; $x < 50; $x++) {


            $user = new User();
            $user->setEmail($faker->email);

            $password = $this->encoder->encodePassword($user, $faker->text(50));
            $user->setPassword($password);
            $user->setNom($faker->name);
            $user->setPrenom($faker->lastName);
            $user->setDateNaissance($faker->dateTime());
            $user->setTel($faker->phoneNumber);
            $user->setDateInscription($faker->dateTime());
            $user->setRoles( $roles[$x%3]);
            $user->setRating($ratingUser[$x]);
            $user->setPosts($posts[$x]);
            $user->setCommentaires($commentaires[$x]);

            $manager->persist($user);
            $manager->flush();


        }


        /* doc-> pro / eth -> post relations */
        for ($x = 0; $x < 50; $x++) {
            $doc[$x]->setProfessionnel($pro[0]);
            $ethics[$x]->setPost($posts[$x]);
            $ethics1[$x]->setPost($posts[$x]);
            $ethics2[$x]->setPost($posts[$x]);
            $ethics3[$x]->setPost($posts[$x]);
            $ethics4[$x]->setPost($posts[$x]);

            $manager->persist($ethics[$x]);
            $manager->persist($ethics1[$x]);
            $manager->persist($ethics2[$x]);
            $manager->persist($ethics3[$x]);
            $manager->persist($ethics4[$x]);
            $manager->flush();
        }


        $users = $manager->getRepository(User::class)->findAll();



        for ($x = 1; $x < 50; $x++) {

            $populator->addEntity(Professionel::class, 1,$customColumnFormatters = array(
                'user' => $users[$x])
            );
            $populator->execute();
        }

    }


    public function ratingUser(ObjectManager $manager,$faker)
    {


        $populator = new \Faker\ORM\Doctrine\Populator($faker, $manager);
        $populator->addEntity(\App\Entity\RatingUser::class, 50,$customColumnFormatters = array(
            'risque' =>  function() {return random_int(0,100) ;},
            'benefice' =>  function() { return random_int(0,100); })

        );

        $populator->execute();

    }



    public function ethics($populator)
    {


        $populator->addEntity(ObjectifsEthiques::class, 50);
        $populator->addEntity(ModelesDeSoin::class, 50);
        $populator->addEntity(ContextesDeSoin::class, 50);
        $populator->addEntity(MethodesEvaluation::class, 50);
        $populator->addEntity(ObjectifsDeSoin::class, 50);



        $populator->execute();
    }

    public function commentaires(ObjectManager $manager,$faker,$populator){


        $ratingUser = $manager->getRepository(RatingUser::class)->findAll();




        for ($x = 0; $x < 50; $x++) {

            $populator->addEntity(Commentaire::class, 1, $customColumnFormatters = array(
                'moyenne_benefice' => function () { return random_int(15, 75);},
                'moyenne_risque' => function () {return random_int(15, 60);},
                'rating' => $ratingUser[$x])
            );

            $populator->execute();
        }


    }

    public function documents($populator){

        $populator->addEntity(Documents::class, 50);

        $populator->execute();

    }

    public function posts($populator,$manager){

        $commentaires = $manager->getRepository(Commentaire::class)->findAll();
        $roles = $manager->getRepository(Role::class)->findAll();

        for ($x = 0; $x < 50; $x++) {

            $populator->addEntity(Post::class, 1,$customColumnFormatters = array(
                'commentaires' => $commentaires[$x] ,
                'roles' => $roles[$x%3] ,
            )
            );
            $populator->execute();
        }

    }


    public  function professionels($populator,$manager){


        $users = $manager->getRepository(User::class)->findAll();



        for ($x = 0; $x < count($users); $x++) {

            $populator->addEntity(Professionel::class, 1,$customColumnFormatters = array(
                'user' => $users[$x])
            );
            $populator->execute();
        }



    }


}
