<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SelectCalendarController extends AbstractController
{
    /**
     * @Route("/select/calendar", name="select_calendar")
     */
    public function index()
    {
        return $this->render('select_calendar/index.html.twig', [
            'controller_name' => 'SelectCalendarController',
        ]);
    }

    /**
     * @Route("select/welcome", name="welcome_calendar")
     */
    public function showCalendar()
    {
        $month = new \App\Service\Month($_GET['month'] ?? null, $_GET['year'] ?? null) ;
        $startingDay = $month->getStartingDay();
        $startingDay = $startingDay->format("N") == 1 ? $startingDay : $startingDay->modify('last monday');

        return $this->render('select_calendar/showCalendar.html.twig', [
            'month' => $month,
            'startingDay' => $startingDay
        ]);
    }
}
