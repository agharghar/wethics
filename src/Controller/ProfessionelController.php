<?php

namespace App\Controller;

use App\Entity\Professionel;
use App\Form\ProfessionelType;
use App\Repository\ProfessionelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/professionel")
 */
class ProfessionelController extends AbstractController
{
    /**
     * @Route("/", name="professionel_index", methods={"GET"})
     */
    public function index(ProfessionelRepository $professionelRepository): Response
    {
        return $this->render('professionel/index.html.twig', [
            'professionels' => $professionelRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="professionel_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $professionel = new Professionel();
        $form = $this->createForm(ProfessionelType::class, $professionel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($professionel);
            $entityManager->flush();

            return $this->redirectToRoute('professionel_index');
        }

        return $this->render('professionel/new.html.twig', [
            'professionel' => $professionel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="professionel_show", methods={"GET"})
     */
    public function show(Professionel $professionel): Response
    {
        return $this->render('professionel/show.html.twig', [
            'professionel' => $professionel,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="professionel_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Professionel $professionel): Response
    {
        $form = $this->createForm(ProfessionelType::class, $professionel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('professionel_index');
        }

        return $this->render('professionel/edit.html.twig', [
            'professionel' => $professionel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="professionel_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Professionel $professionel): Response
    {
        if ($this->isCsrfTokenValid('delete'.$professionel->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($professionel);
            $entityManager->flush();
        }

        return $this->redirectToRoute('professionel_index');
    }
}
