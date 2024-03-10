<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Entity\Produits;
use App\Entity\Categories;
use App\Form\RegistrationFormType;
use App\Repository\ProduitsRepository;
use App\Repository\CategoriesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home', methods: ['GET'])]
public function index(ProduitsRepository $produitsRepository, CategoriesRepository $categoriesRepository): Response
{
    $produit = $produitsRepository->findAll();
    $categories = $categoriesRepository->findAll();

    return $this->render('home/index.html.twig', [
        'produits' => $produit,
        'categories' => $categories,
    ]);
}


    #[Route('/home/{id}', name: 'app_detail', methods: ['GET'])]
    public function show(Produits $produit,Categories $categories,CategoriesRepository $categoriesRepository): Response
    {

        $categories = $categoriesRepository->findAll();
        return $this->render('home/show2.html.twig', [
            'produits' => $produit,
            'categories' => $categories,
        ]);
    }
    #[Route('/home/search/{id}', name: 'app_produits_find')]
    public function searchByLibelle($id, CategoriesRepository $rep): Response
    {
        $categorie = $rep->find($id);

        if (!$categorie) {
            throw $this->createNotFoundException('La catégorie n\'existe pas.');
        }

        $produits = $categorie->getProduits();

        return $this->render('home/show.html.twig', [
            'produits' => $produits,
        ]);
    }
       
    }
    

   
