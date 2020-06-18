<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product_list")
     */
        public function list(ProductRepository $repository)
        {
            // Recuperer  toutes les entités: findALL =>retourne un tableau
            // recuperer plusieurs entités selon des criteres: findBy => retourne un tableau
            // Recuperer une entité selon  le critère: findOnBy : retourne l'entité
            // recuperer par son IDENTIFIANT : find(1)  id=1;


            return $this->render('product/list.html.twig',[
                'product_list'=>$repository->findAll()
            ]);

        }


    /**
     * Modification d'un produit
     * @Route("/product/{id}/edit", name="product_edit")
     * on peut mettre ds le 3argument l'action
     */
        public function edit($id)
        {
            return $this->render('product/edit.html.twig', [
                'titre' => 'les listes des produits'
            ]);
        }

    /**
     * Modification d'un produit
     * @Route("/product/new", name="product_add")
     * on peut mettre ds le 3argument l'action
     */
        public function add( ){
            return $this->render('product/add.html.twig');
        }

}

