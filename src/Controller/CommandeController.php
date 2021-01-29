<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CommandeController extends AbstractController
{
    /**
     * @Route("/commande", name="commande_index")
     */
    public function index()
    {
        return $this->render('commande/index.html.twig', [
            'controller_name' => 'CommandeController',
        ]);
    }


    /**
     * @Route("/commande/valid", name="commande_valid")
     */
    public function validCommande()
    {
        return $this->render('commande/validC.html.twig', [
            'controller_name' => 'CommandeController',
        ]);
    }
}
