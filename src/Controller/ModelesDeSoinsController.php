<?php

namespace App\Controller;

use App\Entity\ModelesDeSoins;
use App\Form\ModelesDeSoins1Type;
use App\Repository\ModelesDeSoinsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/modeles/de/soins")
 */
class ModelesDeSoinsController extends AbstractController
{
    /**
     * @Route("/", name="modeles_de_soins_index", methods={"GET"})
     */
    public function index(ModelesDeSoinsRepository $modelesDeSoinsRepository): Response
    {
        return $this->render('modeles_de_soins/index.html.twig', [
            'modeles_de_soins' => $modelesDeSoinsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="modeles_de_soins_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $modelesDeSoin = new ModelesDeSoins();
        $form = $this->createForm(ModelesDeSoins1Type::class, $modelesDeSoin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($modelesDeSoin);
            $entityManager->flush();

            return $this->redirectToRoute('modeles_de_soins_index');
        }

        return $this->render('modeles_de_soins/new.html.twig', [
            'modeles_de_soin' => $modelesDeSoin,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="modeles_de_soins_show", methods={"GET"})
     */
    public function show(ModelesDeSoins $modelesDeSoin): Response
    {
        return $this->render('modeles_de_soins/show.html.twig', [
            'modeles_de_soin' => $modelesDeSoin,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="modeles_de_soins_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ModelesDeSoins $modelesDeSoin): Response
    {
        $form = $this->createForm(ModelesDeSoins1Type::class, $modelesDeSoin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('modeles_de_soins_index');
        }

        return $this->render('modeles_de_soins/edit.html.twig', [
            'modeles_de_soin' => $modelesDeSoin,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="modeles_de_soins_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ModelesDeSoins $modelesDeSoin): Response
    {
        if ($this->isCsrfTokenValid('delete'.$modelesDeSoin->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($modelesDeSoin);
            $entityManager->flush();
        }

        return $this->redirectToRoute('modeles_de_soins_index');
    }
}
