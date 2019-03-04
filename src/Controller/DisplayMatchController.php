<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DisplayMatchController extends AbstractController
{
    /**
     * @Route("/display/match", name="display_match")
     */
    public function index()
    {
        $month = new \App\Service\Month($_GET['month'] ?? null, $_GET['year'] ?? null) ;
        $startingDay = $month->getStartingDay();
        $startingDay = $startingDay->format("N") == 1 ? $startingDay : $startingDay->modify('last monday');

        return $this->render('display_match/index.html.twig', [
            'month' => $month,
            'startingDay' => $startingDay
        ]);
    }
}
