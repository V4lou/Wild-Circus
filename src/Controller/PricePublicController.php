<?php

namespace App\Controller;

use App\Entity\Price;
use App\Repository\PriceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PricePublicController extends  AbstractController
{
    /**
     * @Route("/tarif", name="wild_circus_tarif")
     */
    public function index(PriceRepository $priceRepository) :Response
{
    $tarifs = $priceRepository->findAll();
    return $this->render('public/price.html.twig', [
        'tarifs' => $tarifs,
    ]);
}


}