<?php

namespace App\Controller;

use App\Entity\Probleme;
use App\Form\Probleme1Type;
use App\Repository\ProblemeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/probleme")
 */
class ProblemeController extends AbstractController
{
    /**
     * @Route("/", name="probleme_index", methods={"GET"})
     */
    public function index(ProblemeRepository $problemeRepository): Response
    {
        return $this->render('probleme/index.html.twig', [
            'problemes' => $problemeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="probleme_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $probleme = new Probleme();
        $form = $this->createForm(Probleme1Type::class, $probleme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($probleme);
            $entityManager->flush();

            return $this->redirectToRoute('probleme_index');
        }

        return $this->render('probleme/new.html.twig', [
            'probleme' => $probleme,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="probleme_show", methods={"GET"})
     */
    public function show(Probleme $probleme): Response
    {
        return $this->render('probleme/show.html.twig', [
            'probleme' => $probleme,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="probleme_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Probleme $probleme): Response
    {
        $form = $this->createForm(Probleme1Type::class, $probleme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('probleme_index');
        }

        return $this->render('probleme/edit.html.twig', [
            'probleme' => $probleme,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="probleme_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Probleme $probleme): Response
    {
        if ($this->isCsrfTokenValid('delete'.$probleme->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($probleme);
            $entityManager->flush();
        }

        return $this->redirectToRoute('probleme_index');
    }
}
