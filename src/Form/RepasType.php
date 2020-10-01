<?php

namespace App\Form;

use App\Entity\Repas;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RepasType extends AbstractType
{
    const MENUS = [
        'MENU 1 ' => 'Entree Plat et 15€ ',
        'MENU 2 ' => 'Entree Plat Dessert 25€ ',
        'MENU 3 ' => 'Entree Plat Dessert Boisson 35€ ',
    ];
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('participant')
            ->add('menu',ChoiceType::class,[
                'choices'=> self::MENUS,'multiple'=>true
            ])
            ->add('submit',SubmitType::class,['label'=>'Ajouter les Menu'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Repas::class,
        ]);
    }
}
