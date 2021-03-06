<?php

namespace App\Form;

use App\Entity\Annonce;
use App\Entity\Jeu;
use App\Entity\Plateforme;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Choice;

class AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prix')
            ->add('boite')
            ->add('jeu', EntityType::class,[
                'class' => Jeu::class,
                'choice_label' => 'titre',
                'multiple' => false,
                'expanded' => false,
            ])
            ->add('plateforme', EntityType::class,[
                'class' => Plateforme::class,
                'choice_label' => 'titre',
                'multiple' => false,
                'expanded' => false,
            ])
            ->add('status', ChoiceType::class, [
                'choices' => [
                    'Non Publié' => 'Non-Publié',
                    'Publié' => 'Publié'
                ],
                'expanded' => true,
                'multiple' => false,
                'label' => 'Status' 
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }
}
