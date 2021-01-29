<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{

    /**
     * @Route("/", name="product_home")
     */
    public function getAllProducts(ProductRepository $repository)
    {
        /*$products = $repository->findAll();

        return $this->render('Product/getAllProducts.html.twig', [
            'products' => $products,
        ]);*/

        $products = $repository->findSearch();
        return $this->render('Product/getAllProducts.html.twig', [
            'products' => $products,
        ]);
    }


    /**
     * @Route("/product/{id}", name="product_show")
     */
    public function getProductById($id, ProductRepository $repository)
    {
        $product = $repository->find($id);

        return $this->render('Product/getProductById.html.twig', [
            'product' => $product,
        ]);
    }


}
