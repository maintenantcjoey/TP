<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateAccountType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('familyName', TextType::class, [
                'label' => 'Last name',
                'attr' => [
                    'placeholder' => 'Your family name'
                ]
            ])
            ->add('givenName', TextType::class, [
                'attr' => [
                    'placeholder' => 'Your first name'
                ],
                'label' => 'First name'
            ])
            ->add('email', EmailType::class, [
                'label' => 'E-mail',
                'attr' => [
                    'placeholder' => 'Your e-mail'
                ]
            ])
            ->add('password', PasswordType::class, [
                'attr' => [
                    'placeholder' => 'Your password'
                ]
            ])
            ->add('password_verify', PasswordType::class, [
                'label' => 'Please re-enter your password for verification',
                'attr' => [
                    'placeholder' => 'Your password'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
