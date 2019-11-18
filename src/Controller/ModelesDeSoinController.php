<?php

namespace App\Controller;

use App\Entity\ModelesDeSoin;
use App\Form\ModelesDeSoinType;
use App\Repository\ModelesDeSoinRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/modeles/de/soin")
 */
class ModelesDeSoinController extends AbstractController
{
    /**
     * @Route("/", name="modeles_de_soin_index", methods={"GET"})
     */
    public function index(ModelesDeSoinRepository $modelesDeSoinRepository): Response
    {
        return $this->render('modeles_de_soin/index.html.twig', [
            'modeles_de_soins' => $modelesDeSoinRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="modeles_de_soin_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $modelesDeSoin = new ModelesDeSoin();
        $form = $this->createForm(ModelesDeSoinType::class, $modelesDeSoin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($modelesDeSoin);
            $entityManager->flush();

            return $this->redirectToRoute('modeles_de_soin_index');
        }

        return $this->render('modeles_de_soin/new.html.twig', [
            'modeles_de_soin' => $modelesDeSoin,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="modeles_de_soin_show", methods={"GET"})
     */
    public function show(ModelesDeSoin $modelesDeSoin): Response
    {
        return $this->render('modeles_de_soin/show.html.twig', [
            'modeles_de_soin' => $modelesDeSoin,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="modeles_de_soin_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ModelesDeSoin $modelesDeSoin): Response
    {
        $form = $this->createForm(ModelesDeSoinType::class, $modelesDeSoin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('modeles_de_soin_index');
        }

        return $this->render('modeles_de_soin/edit.html.twig', [
            'modeles_de_soin' => $modelesDeSoin,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="modeles_de_soin_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ModelesDeSoin $modelesDeSoin): Response
    {
        if ($this->isCsrfTokenValid('delete'.$modelesDeSoin->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($modelesDeSoin);
            $entityManager->flush();
        }

        return $this->redirectToRoute('modeles_de_soin_index');
    }
}
