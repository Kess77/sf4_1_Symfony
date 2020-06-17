<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product_list")
     */
        public function list()
        {
            return $this->render('product/list.html.twig');


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

