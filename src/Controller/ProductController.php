<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product_list")
     */
   public function list(){
       return $this->render('product.html.twig',[

           'article'=>[
               'manja',
               'mena',
               'manjae',
               'merona'
           ]
       ]);

   }


    /**
     * Modification d'un produit
     * @route("/product/{id}/edit", name="product_edit")
     * on peut mettre ds le 3argument l'action
     */
    public function edit($id){
        return $this->json([
            'titre'=>'Modifier le produit'.$id,

        ]);
    }
}
