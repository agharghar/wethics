<?php

namespace App\Controller;

use App\Entity\ObjectifsEthics;
use App\Form\ObjectifsEthics1Type;
use App\Repository\ObjectifsEthicsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/objectifs/ethics")
 */
class ObjectifsEthicsController extends AbstractController
{
    /**
     * @Route("/", name="objectifs_ethics_index", methods={"GET"})
     */
    public function index(ObjectifsEthicsRepository $objectifsEthicsRepository): Response
    {
        return $this->render('objectifs_ethics/index.html.twig', [
            'objectifs_ethics' => $objectifsEthicsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="objectifs_ethics_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $objectifsEthic = new ObjectifsEthics();
        $form = $this->createForm(ObjectifsEthics1Type::class, $objectifsEthic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($objectifsEthic);
            $entityManager->flush();

            return $this->redirectToRoute('objectifs_ethics_index');
        }

        return $this->render('objectifs_ethics/new.html.twig', [
            'objectifs_ethic' => $objectifsEthic,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="objectifs_ethics_show", methods={"GET"})
     */
    public function show(ObjectifsEthics $objectifsEthic): Response
    {
        return $this->render('objectifs_ethics/show.html.twig', [
            'objectifs_ethic' => $objectifsEthic,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="objectifs_ethics_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ObjectifsEthics $objectifsEthic): Response
    {
        $form = $this->createForm(ObjectifsEthics1Type::class, $objectifsEthic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('objectifs_ethics_index');
        }

        return $this->render('objectifs_ethics/edit.html.twig', [
            'objectifs_ethic' => $objectifsEthic,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="objectifs_ethics_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ObjectifsEthics $objectifsEthic): Response
    {
        if ($this->isCsrfTokenValid('delete'.$objectifsEthic->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($objectifsEthic);
            $entityManager->flush();
        }

        return $this->redirectToRoute('objectifs_ethics_index');
    }
}
