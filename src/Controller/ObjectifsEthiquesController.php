<?php

namespace App\Controller;

use App\Entity\ObjectifsEthiques;
use App\Form\ObjectifsEthiquesType;
use App\Repository\ObjectifsEthiquesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/objectifs/ethiques")
 */
class ObjectifsEthiquesController extends AbstractController
{
    /**
     * @Route("/", name="objectifs_ethiques_index", methods={"GET"})
     */
    public function index(ObjectifsEthiquesRepository $objectifsEthiquesRepository): Response
    {
        return $this->render('objectifs_ethiques/index.html.twig', [
            'objectifs_ethiques' => $objectifsEthiquesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="objectifs_ethiques_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $objectifsEthique = new ObjectifsEthiques();
        $form = $this->createForm(ObjectifsEthiquesType::class, $objectifsEthique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($objectifsEthique);
            $entityManager->flush();

            return $this->redirectToRoute('objectifs_ethiques_index');
        }

        return $this->render('objectifs_ethiques/new.html.twig', [
            'objectifs_ethique' => $objectifsEthique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="objectifs_ethiques_show", methods={"GET"})
     */
    public function show(ObjectifsEthiques $objectifsEthique): Response
    {
        return $this->render('objectifs_ethiques/show.html.twig', [
            'objectifs_ethique' => $objectifsEthique,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="objectifs_ethiques_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ObjectifsEthiques $objectifsEthique): Response
    {
        $form = $this->createForm(ObjectifsEthiquesType::class, $objectifsEthique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('objectifs_ethiques_index');
        }

        return $this->render('objectifs_ethiques/edit.html.twig', [
            'objectifs_ethique' => $objectifsEthique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="objectifs_ethiques_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ObjectifsEthiques $objectifsEthique): Response
    {
        if ($this->isCsrfTokenValid('delete'.$objectifsEthique->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($objectifsEthique);
            $entityManager->flush();
        }

        return $this->redirectToRoute('objectifs_ethiques_index');
    }
}
