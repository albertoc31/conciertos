<?php

namespace App\Controller;

use App\Entity\Concierto;
use App\Form\ConciertoType;
use App\Repository\ConciertoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/concierto")
 */
class ConciertoController extends AbstractController
{
    /**
     * @Route("/", name="concierto_index", methods={"GET"})
     */
    public function index(ConciertoRepository $conciertoRepository): Response
    {
        return $this->render('concierto/index.html.twig', [
            'conciertos' => $conciertoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="concierto_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $concierto = new Concierto();
        $form = $this->createForm(ConciertoType::class, $concierto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($concierto);
            $entityManager->flush();

            return $this->redirectToRoute('concierto_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('concierto/new.html.twig', [
            'concierto' => $concierto,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="concierto_show", methods={"GET"})
     */
    public function show(Concierto $concierto): Response
    {
        return $this->render('concierto/show.html.twig', [
            'concierto' => $concierto,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="concierto_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Concierto $concierto): Response
    {
        $form = $this->createForm(ConciertoType::class, $concierto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('concierto_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('concierto/edit.html.twig', [
            'concierto' => $concierto,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="concierto_delete", methods={"POST"})
     */
    public function delete(Request $request, Concierto $concierto): Response
    {
        if ($this->isCsrfTokenValid('delete'.$concierto->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($concierto);
            $entityManager->flush();
        }

        return $this->redirectToRoute('concierto_index', [], Response::HTTP_SEE_OTHER);
    }
}
