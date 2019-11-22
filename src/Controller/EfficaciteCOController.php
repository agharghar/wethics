<?php

namespace App\Controller;

use App\Entity\EfficaciteCO;
use App\Form\EfficaciteCO1Type;
use App\Repository\EfficaciteCORepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/efficacite/c/o")
 */
class EfficaciteCOController extends AbstractController
{
    /**
     * @Route("/", name="efficacite_c_o_index", methods={"GET"})
     */
    public function index(EfficaciteCORepository $efficaciteCORepository): Response
    {
        return $this->render('efficacite_co/index.html.twig', [
            'efficacite_c_os' => $efficaciteCORepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="efficacite_c_o_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $efficaciteCO = new EfficaciteCO();
        $form = $this->createForm(EfficaciteCO1Type::class, $efficaciteCO);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($efficaciteCO);
            $entityManager->flush();

            return $this->redirectToRoute('efficacite_c_o_index');
        }

        return $this->render('efficacite_co/new.html.twig', [
            'efficacite_c_o' => $efficaciteCO,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="efficacite_c_o_show", methods={"GET"})
     */
    public function show(EfficaciteCO $efficaciteCO): Response
    {
        return $this->render('efficacite_co/show.html.twig', [
            'efficacite_c_o' => $efficaciteCO,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="efficacite_c_o_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, EfficaciteCO $efficaciteCO): Response
    {
        $form = $this->createForm(EfficaciteCO1Type::class, $efficaciteCO);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('efficacite_c_o_index');
        }

        return $this->render('efficacite_co/edit.html.twig', [
            'efficacite_c_o' => $efficaciteCO,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="efficacite_c_o_delete", methods={"DELETE"})
     */
    public function delete(Request $request, EfficaciteCO $efficaciteCO): Response
    {
        if ($this->isCsrfTokenValid('delete'.$efficaciteCO->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($efficaciteCO);
            $entityManager->flush();
        }

        return $this->redirectToRoute('efficacite_c_o_index');
    }
}
