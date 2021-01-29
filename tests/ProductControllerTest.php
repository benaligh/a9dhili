<?php

namespace App\tests;

use App\Controller\ProductController;
use App\Entity\Product;
use App\Repository\ProductRepository;
use PHPUnit\Framework\TestCase;

class ProductControllerTest extends TestCase
{

    public function testgetAllProducts(ProductRepository $productRepository)
    {
        $product = new Product('','','','');

    }


}
