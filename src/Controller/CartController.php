<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Service\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    /**
     * @Route("/cart", name="cart_show")
     */
    public function index(SessionInterface $session, ProductRepository $repo, CartService $cartService)
    {
        $panierWithData = $cartService->getFullCart();
        $total = 0;
        foreach ($panierWithData as $item) {
            $totalItem = $item['product']->getPrice() * $item['quantity'];
            $total += $totalItem;

        }
        /*$nbre = count($panierWithData);
        var_dump($nbre);*/

        return $this->render('cart/panier.html.twig', [
            'items' => $panierWithData,
            'total' => $total
        ]);
    }


    /**
     * @Route("/cart/add/{id}", name="cart_add")
     */
    public function add($id, SessionInterface $session, CartService $cartService)
    {

        $cartService->addCart($id);
        $this->addFlash('success', 'Produit ajouté au panier');
        return $this->redirectToRoute('cart_show');
    }

    /**
     * @Route("/cart/remove/{id}", name="cart_remove")
     */
    public function remove($id, SessionInterface $session, CartService $cartService)
    {
        $cartService->removeCart($id);
        $this->addFlash('success', 'Produit supprimé au panier');
        return $this->redirectToRoute('cart_show');
    }
}
