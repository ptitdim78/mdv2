<?php

namespace App\Controller;

use App\Entity\Products;
use App\Entity\ProductsClothes;
use App\Entity\Reviews;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductsController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/products", name="products", methods={"GET|POST"})
     * @return Response
     */
    public function index(): Response
    {
        $products= $this->getDoctrine()->getRepository(Products::class)->findBy([], ['id'=>'DESC']);
        $productsClothes= $this->getDoctrine()->getRepository(ProductsClothes::class)->findBy([], ['id'=>'DESC']);

        return $this->render('products/index.html.twig', [
            'controller_name' => 'ProductsController',
            'products'=>$products, 'productsClothes'=>$productsClothes
        ]);
    }
}
