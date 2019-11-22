<?php

namespace App\Controller;

use App\Entity\ObjectifsDeSoin;
use App\Form\ObjectifsDeSoin1Type;
use App\Repository\ObjectifsDeSoinRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/objectifs/de/soin")
 */
class ObjectifsDeSoinController extends AbstractController
{
    /**
     * @Route("/", name="objectifs_de_soin_index", methods={"GET"})
     */
    public function index(ObjectifsDeSoinRepository $objectifsDeSoinRepository): Response
    {
        return $this->render('objectifs_de_soin/index.html.twig', [
            'objectifs_de_soins' => $objectifsDeSoinRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="objectifs_de_soin_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $objectifsDeSoin = new ObjectifsDeSoin();
        $form = $this->createForm(ObjectifsDeSoin1Type::class, $objectifsDeSoin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($objectifsDeSoin);
            $entityManager->flush();

            return $this->redirectToRoute('objectifs_de_soin_index');
        }

        return $this->render('objectifs_de_soin/new.html.twig', [
            'objectifs_de_soin' => $objectifsDeSoin,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="objectifs_de_soin_show", methods={"GET"})
     */
    public function show(ObjectifsDeSoin $objectifsDeSoin): Response
    {
        return $this->render('objectifs_de_soin/show.html.twig', [
            'objectifs_de_soin' => $objectifsDeSoin,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="objectifs_de_soin_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ObjectifsDeSoin $objectifsDeSoin): Response
    {
        $form = $this->createForm(ObjectifsDeSoin1Type::class, $objectifsDeSoin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('objectifs_de_soin_index');
        }

        return $this->render('objectifs_de_soin/edit.html.twig', [
            'objectifs_de_soin' => $objectifsDeSoin,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="objectifs_de_soin_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ObjectifsDeSoin $objectifsDeSoin): Response
    {
        if ($this->isCsrfTokenValid('delete'.$objectifsDeSoin->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($objectifsDeSoin);
            $entityManager->flush();
        }

        return $this->redirectToRoute('objectifs_de_soin_index');
    }
}
