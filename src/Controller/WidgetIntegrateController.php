<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class WidgetIntegrateController extends AbstractController
{
    /**
     * @Route("/widget/integrate", name="widget_integrate")
     */
    public function index()
    {
        return $this->render('widget_integrate/index.html.twig', [
            'controller_name' => 'WidgetIntegrateController',
        ]);
    }
}
