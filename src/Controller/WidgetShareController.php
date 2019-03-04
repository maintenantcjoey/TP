<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class WidgetShareController extends AbstractController
{
    /**
     * @Route("/widget/share", name="widget_share")
     */
    public function index()
    {
        return $this->render('widget_share/index.html.twig', [
            'controller_name' => 'WidgetShareController',
        ]);
    }
}
