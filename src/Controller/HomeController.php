<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * URL:localhost/route
     * URI:/route
     * @Route("/", name="home")
     */
    public function index()
    {
        #affiche le contenu du fichiers dans le dossier Templates
        return $this->render('home.html.twig',[
            'pseudo'=>'john Doe',
            'liste'=>['
            foo',
                'bar',
                'baz',
                ]
        ]);
    }


    /**
     * on place les  parametre dynamique entre accolade
     * URI valide:/test/42
     * @Route("/test", name="test")
     */
    public function test(EntityManagerInterface $em ) // type + le nom argument // REQUEST permet de recuperer _GET ,_POST
  {
        //creation d'une entité : EntityManagerInterface est un objet qui permet
      //de nous enregistrer les new objet dans la bdd
      $product = new Product();
      $product
          ->setName('Jeans')
          ->setDescription('un super Jeans')
          ->setPrice(79.99)
          ->setQuantity(50)
      ;
      //pour verifier le EMI : avant l'enregistrement
      dump($product);

      //Enregistrement (insertion)
      //1. preparer à l'enregistrement d'une entité
      $em->persist($product);
      //2.Executer les requetes SQL
      $em->flush();


      //fonction de debug dump() & die: Apres l'enregistrement: on a notre id=1
      dd($product);

  }

}
