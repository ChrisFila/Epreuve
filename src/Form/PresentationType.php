<?php

namespace App\Form;

use App\Entity\Presentation;
use App\Entity\Medicament;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\PositiveOrZero;

class PresentationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('medicament', EntityType::class, [
                'label' => 'Médicament',
                'class' => Medicament::class,
                'choice_label' => 'nom_commercial',
                'placeholder' => '',
                'constraints' => [
                    new NotBlank([
                        'message' => "Erreur dans le choix du médicament."
                    ])
                ]
            ])
            ->add('quantite_offerte', IntegerType::class, [
                'label' => 'Quantité offerte',
                'constraints' => [
                    new PositiveOrZero([
                        'message' => 'La quantité offerte ne peut être négative.'
                    ]),
                    new NotBlank([
                        'message' => "Veuillez sélectionner une quantité offerte."
                    ])
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Presentation::class,
        ]);
    }
}
