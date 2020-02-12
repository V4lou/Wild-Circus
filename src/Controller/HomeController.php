<?php

namespace App\Controller;

use App\Entity\Planning;
use App\Repository\PlanningRepository;
use App\Entity\Performance;
use App\Repository\PerformanceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends  AbstractController
{
    /**
     * @Route("/", name="wild_circus_index")
     */
    public function index(PerformanceRepository $performanceRepository, PlanningRepository $planningRepository) :Response
{
    $performances = $performanceRepository->findBy([], ['title' => 'ASC'], 3);
    $dates = $planningRepository->findBy([],['infodate' => 'ASC'], 1);
    return $this->render('public/home.html.twig', [
        'performances' => $performances,
        'dates' => $dates,
    ]);
}


}