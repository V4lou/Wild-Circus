<?php

namespace App\Controller;

use App\Entity\Planning;
use App\Repository\PlanningRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DatePublicController extends  AbstractController
{
    /**
     * @Route("/date", name="wild_circus_date")
     */
    public function index(PlanningRepository $planningRepository) :Response
{
    $dates = $planningRepository->findby([], ['infodate' => 'ASC']);
    return $this->render('public/date.html.twig', [
        'dates' => $dates,
    ]);
}


}