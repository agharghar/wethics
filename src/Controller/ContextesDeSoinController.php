<?php

namespace App\Controller;

use App\Entity\ContextesDeSoin;
use App\Form\ContextesDeSoinType;
use App\Repository\ContextesDeSoinRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/contextes/de/soin")
 */
class ContextesDeSoinController extends AbstractController
{
    /**
     * @Route("/", name="contextes_de_soin_index", methods={"GET"})
     */
    public function index(ContextesDeSoinRepository $contextesDeSoinRepository): Response
    {
        return $this->render('contextes_de_soin/index.html.twig', [
            'contextes_de_soins' => $contextesDeSoinRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="contextes_de_soin_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $contextesDeSoin = new ContextesDeSoin();
        $form = $this->createForm(ContextesDeSoinType::class, $contextesDeSoin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contextesDeSoin);
            $entityManager->flush();

            return $this->redirectToRoute('contextes_de_soin_index');
        }

        return $this->render('contextes_de_soin/new.html.twig', [
            'contextes_de_soin' => $contextesDeSoin,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="contextes_de_soin_show", methods={"GET"})
     */
    public function show(ContextesDeSoin $contextesDeSoin): Response
    {
        return $this->render('contextes_de_soin/show.html.twig', [
            'contextes_de_soin' => $contextesDeSoin,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="contextes_de_soin_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ContextesDeSoin $contextesDeSoin): Response
    {
        $form = $this->createForm(ContextesDeSoinType::class, $contextesDeSoin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contextes_de_soin_index');
        }

        return $this->render('contextes_de_soin/edit.html.twig', [
            'contextes_de_soin' => $contextesDeSoin,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="contextes_de_soin_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ContextesDeSoin $contextesDeSoin): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contextesDeSoin->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($contextesDeSoin);
            $entityManager->flush();
        }

        return $this->redirectToRoute('contextes_de_soin_index');
    }
}
