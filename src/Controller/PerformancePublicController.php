<?php

namespace App\Controller;

use App\Entity\Performance;
use App\Repository\PerformanceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PerformancePublicController extends  AbstractController
{
    /**
     * @Route("/performance", name="wild_circus_performance")
     */
    public function index(PerformanceRepository $performanceRepository) :Response
{
    $performances = $performanceRepository->findAll();
    return $this->render('public/performance.html.twig', [
        'performances' => $performances,
    ]);
}


}