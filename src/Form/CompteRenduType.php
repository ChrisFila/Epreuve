<?php

namespace App\Form;

use App\Entity\CompteRendu;
use App\Entity\Praticien;
use App\Form\PresentationType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;


class CompteRenduType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date_visite', DateType::class, [
                'widget' => 'single_text',
                'empty_data' => null,
                'invalid_message' => "La date est incorrecte.",
                'constraints' => [
                    new NotBlank([
                        'message' => "Veuillez insérer une date."
                    ]),
                ],
            ])
            ->add('praticien', EntityType::class, [
                'class' => Praticien::class,
                'choice_label' => function(?Praticien $praticien){
                    return $praticien->getNomComplet();
                },
                'placeholder' => '',
                'constraints' => [
                    new NotBlank([
                        'message' => "Erreur dans le choix du praticien."
                    ])
                ]
            ])
            ->add('motif', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => "Veuillez rentrer le motif de la visite.",
                    ]),
                    new Length([
                        'min' => 3,
                        'minMessage' => "Motif de la visite trop succint",
                    ]),
                ],
            ])
            ->add('bilan', TextareaType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => "Veuillez rentrer le bilan de la visite.",
                    ]),
                    new Length([
                        'min' => 10,
                        'minMessage' => "Bilan de la visite trop succint.",
                    ]),
                ],
            ])
            ->add('presentation', CollectionType::class, [
                'entry_type' => PresentationType::class,
                'by_reference' => false,
                'entry_options' => [
                    'label' => false
                ],
                'allow_add' => true,
                'allow_delete' => true
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CompteRendu::class,
        ]);
    }
}
