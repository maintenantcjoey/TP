<?php

namespace App\Controller;

use App\Form\MatchType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class WidgetMatchController extends AbstractController
{
    /**
     * @Route("/widget/match", name="widget_match")
     */
    public function index()
    {
        $form = $this->createForm(MatchType::class);
        return $this->render('widget_match/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
