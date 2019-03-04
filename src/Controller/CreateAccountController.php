<?php

namespace App\Controller;

use App\Form\CreateAccountType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CreateAccountController extends AbstractController
{
    /**
     * @Route("/create/account", name="create_account")
     */
    public function index()
    {
        $form = $this->createForm(CreateAccountType::class);

        return $this->render('create_account/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
