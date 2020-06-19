<?php

namespace App\Controller;

use App\Form\ProductFormType;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    // REQUEST permet de recuperer _GET ,_POST
        public function add(Request $request, EntityManagerInterface $em ){
            //Ceation du formulaire :(le nom du class du formulaire)
            $productForm = $this->createForm(ProductFormType::class);

            // Recuperer les donnees _POST
            //on passe la requete au formulaire
            $productForm->handleRequest($request);


            if($productForm->isSubmitted()&&$productForm->isValid()){ // on verifie que la formulaire envoyer est validé


                    $product=($productForm->getData());// on récupere les données du formulaire


                    $em->persist($product);            // enregistre les données à la bdd
                    $em->flush();
                }
            // pour rafraichir le formulaire, on va faire une redirection
            //redirection dans le fichier product_list pour appliquer la fonction à l'interieur de celui ci
            return $this->redirectToRoute('product_list');


            return $this->render('product/add.html.twig',[
                'product_form'=> $productForm->createView()
            ]);
        }

}

