<?php

namespace App\Controller;

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
     * @Route("/test/{id}",name="test")
     */
    public function test($id,Request $request, SessionInterface $session) // type + le nom argument // REQUEST permet de recuperer _GET ,_POST
  {
        return $this->json([
            'id'=>$id,
            'section'=>$request->query->get('section','profile'),
            'session'=>$session->get('user'),
        ]);
  }

}
