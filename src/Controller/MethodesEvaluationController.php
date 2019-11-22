<?php

namespace App\Controller;

use App\Entity\MethodesEvaluation;
use App\Form\MethodesEvaluation1Type;
use App\Repository\MethodesEvaluationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/methodes/evaluation")
 */
class MethodesEvaluationController extends AbstractController
{
    /**
     * @Route("/", name="methodes_evaluation_index", methods={"GET"})
     */
    public function index(MethodesEvaluationRepository $methodesEvaluationRepository): Response
    {
        return $this->render('methodes_evaluation/index.html.twig', [
            'methodes_evaluations' => $methodesEvaluationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="methodes_evaluation_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $methodesEvaluation = new MethodesEvaluation();
        $form = $this->createForm(MethodesEvaluation1Type::class, $methodesEvaluation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($methodesEvaluation);
            $entityManager->flush();

            return $this->redirectToRoute('methodes_evaluation_index');
        }

        return $this->render('methodes_evaluation/new.html.twig', [
            'methodes_evaluation' => $methodesEvaluation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="methodes_evaluation_show", methods={"GET"})
     */
    public function show(MethodesEvaluation $methodesEvaluation): Response
    {
        return $this->render('methodes_evaluation/show.html.twig', [
            'methodes_evaluation' => $methodesEvaluation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="methodes_evaluation_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, MethodesEvaluation $methodesEvaluation): Response
    {
        $form = $this->createForm(MethodesEvaluation1Type::class, $methodesEvaluation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('methodes_evaluation_index');
        }

        return $this->render('methodes_evaluation/edit.html.twig', [
            'methodes_evaluation' => $methodesEvaluation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="methodes_evaluation_delete", methods={"DELETE"})
     */
    public function delete(Request $request, MethodesEvaluation $methodesEvaluation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$methodesEvaluation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($methodesEvaluation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('methodes_evaluation_index');
    }
}
