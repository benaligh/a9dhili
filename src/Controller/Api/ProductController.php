<?php

namespace App\Controller\Api;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;


/**
 * Class ProductController
 * @package App\Controller\Api
 * @Route("/api")
 */
class ProductController extends AbstractController
{

    /**
     * @Route("/products", name="product_list", methods={"GET"})
     */
    public function getAllProduct(ProductRepository $repository, SerializerInterface $serializer)
    {
        $products = $repository->findAll();
        $dataProd = $serializer->serialize($products,'json',['groups'=>['products_list']]);
        return new Response($dataProd,200,['Content-type'=>'application/json']);
    }

}
