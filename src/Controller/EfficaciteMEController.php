<?php

namespace App\Controller;

use App\Entity\EfficaciteME;
use App\Form\EfficaciteME1Type;
use App\Repository\EfficaciteMERepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/efficacite/m/e")
 */
class EfficaciteMEController extends AbstractController
{
    /**
     * @Route("/", name="efficacite_m_e_index", methods={"GET"})
     */
    public function index(EfficaciteMERepository $efficaciteMERepository): Response
    {
        return $this->render('efficacite_me/index.html.twig', [
            'efficacite_m_es' => $efficaciteMERepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="efficacite_m_e_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $efficaciteME = new EfficaciteME();
        $form = $this->createForm(EfficaciteME1Type::class, $efficaciteME);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($efficaciteME);
            $entityManager->flush();

            return $this->redirectToRoute('efficacite_m_e_index');
        }

        return $this->render('efficacite_me/new.html.twig', [
            'efficacite_m_e' => $efficaciteME,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="efficacite_m_e_show", methods={"GET"})
     */
    public function show(EfficaciteME $efficaciteME): Response
    {
        return $this->render('efficacite_me/show.html.twig', [
            'efficacite_m_e' => $efficaciteME,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="efficacite_m_e_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, EfficaciteME $efficaciteME): Response
    {
        $form = $this->createForm(EfficaciteME1Type::class, $efficaciteME);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('efficacite_m_e_index');
        }

        return $this->render('efficacite_me/edit.html.twig', [
            'efficacite_m_e' => $efficaciteME,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="efficacite_m_e_delete", methods={"DELETE"})
     */
    public function delete(Request $request, EfficaciteME $efficaciteME): Response
    {
        if ($this->isCsrfTokenValid('delete'.$efficaciteME->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($efficaciteME);
            $entityManager->flush();
        }

        return $this->redirectToRoute('efficacite_m_e_index');
    }
}
