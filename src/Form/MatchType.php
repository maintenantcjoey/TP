<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MatchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, ['attr' => ['placeholder' => 'Email of your relation']])
            ->add('duration', ChoiceType::class, ['choices' => ['Select your duration' => null,
                '30 min' => 30, '1 hour' => 60, '2 hours' => 120 ], 'choice_attr' => ['Select your duration' =>
                ['disabled'=> true, 'selected' => true],]])
            ->add('starting', ChoiceType::class, ['choices' => ['Select the week' => null, 'Now' => 1,
                'Last week' => 2], 'choice_attr' => ['Select the week' => ['disabled' => true, 'selected' => true],]])
            ->add('range', ChoiceType::class, ['choices' => ['Select a slot' => null, '8AM to 12AM' => 1,
                '12AM to 14PM' => 2, '14PM to 18PM' => 3, '18PM to 20PM' => 4], 'choice_attr' => ['Select a slot' =>
                ['disabled' => true, 'selected' => true],]]);
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
        ]);
    }
}
