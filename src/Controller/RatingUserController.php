<?php

namespace App\Controller;

use App\Entity\RatingUser;
use App\Form\RatingUserType;
use App\Repository\RatingUserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/rating/user")
 */
class RatingUserController extends AbstractController
{
    /**
     * @Route("/", name="rating_user_index", methods={"GET"})
     */
    public function index(RatingUserRepository $ratingUserRepository): Response
    {
        return $this->render('rating_user/index.html.twig', [
            'rating_users' => $ratingUserRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="rating_user_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ratingUser = new RatingUser();
        $form = $this->createForm(RatingUserType::class, $ratingUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ratingUser);
            $entityManager->flush();

            return $this->redirectToRoute('rating_user_index');
        }

        return $this->render('rating_user/new.html.twig', [
            'rating_user' => $ratingUser,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rating_user_show", methods={"GET"})
     */
    public function show(RatingUser $ratingUser): Response
    {
        return $this->render('rating_user/show.html.twig', [
            'rating_user' => $ratingUser,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="rating_user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, RatingUser $ratingUser): Response
    {
        $form = $this->createForm(RatingUserType::class, $ratingUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rating_user_index');
        }

        return $this->render('rating_user/edit.html.twig', [
            'rating_user' => $ratingUser,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rating_user_delete", methods={"DELETE"})
     */
    public function delete(Request $request, RatingUser $ratingUser): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ratingUser->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ratingUser);
            $entityManager->flush();
        }

        return $this->redirectToRoute('rating_user_index');
    }
}
