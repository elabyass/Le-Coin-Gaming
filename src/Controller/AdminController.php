<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Entity\Jeu;
use App\Form\AnnonceType;
use App\Form\JeuType;
use App\Repository\AnnonceRepository;
use App\Repository\JeuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



/**
 * @Route("/admin")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
        ]);
    }


    /**
     * @Route("/annonces", name="admin_annonces", methods={"GET"})
     */
    public function les_annonce(AnnonceRepository $annonceRepository): Response
    {
        $annonces = $annonceRepository->findAllAnnonce();
        return $this->render('admin/annonces.html.twig', [
            'annonces' => $annonces,
        ]);
    }

    /**
     * @Route("/annonces/{id}", name="admin_annonce_show", methods={"GET"})
     */
    public function show_annonce(Annonce $annonce): Response
    {
        $plateforme = $annonce->getPlateforme();
        $jeu = $annonce->getJeu();
        $user = $annonce->getUser();

        return $this->render('admin/annonce_show.html.twig', [
            'annonce' => $annonce,
            'jeu' => $jeu,
            'plateforme' => $plateforme,
            'user' => $user,
        ]);
    }

    /**
     * @Route("/jeux", name="admin_jeu", methods={"GET"})
     */
    public function les_jeu(JeuRepository $jeuRepository): Response
    {
        return $this->render('admin/jeux.html.twig', [
            'jeus' => $jeuRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new_jeu", name="admin_jeu_new", methods={"GET","POST"})
     */
    public function new_jeu(Request $request): Response
    {
        $jeu = new Jeu();
        $form = $this->createForm(JeuType::class, $jeu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($jeu);
            $entityManager->flush();

            return $this->redirectToRoute('admin_jeu');
        }

        return $this->render('admin/jeux_new.html.twig', [
            'jeu' => $jeu,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/annonces/{id}/edit", name="admin_annonce_edit", methods={"GET","POST"})
     */
    public function edit_annonce(Request $request, Annonce $annonce): Response
    {
        $form = $this->createForm(AnnonceType::class, $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_annonces');
        }

        return $this->render('admin/annonce_edit.html.twig', [
            'annonce' => $annonce,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/jeux/{id}", name="admin_jeu_show", methods={"GET"})
     */
    public function show_jeu(Jeu $jeu): Response
    {
        $annonces = $jeu->getAnnonces();

        return $this->render('admin/jeux_show.html.twig', [
            'jeu' => $jeu,
            'annonces' => $annonces,
        ]);
    }
}