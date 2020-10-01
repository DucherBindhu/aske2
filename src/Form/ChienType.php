<?php

namespace App\Form;

use App\Entity\Chien;
use Faker\Provider\Text;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChienType extends AbstractType
{
    const CATEGORIES = [
        'category A' => 'A',
        'category B' => 'B',
        'category C' => 'C',
    ];
    const EPREUVES = [
        'EPREUVE 1 ' => 'epreuve 1 ',
        'EPREUVE 2 ' => 'epreuve 2 ',
        'EPREUVE 3 ' => 'epreuve 3 ',
    ];

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenom',TextType::class,['label'=>'Nom Chien'])
            ->add('race',TextType::class,['label'=>'Race Du Chien'])
            ->add('licence',NumberType::class,['label'=>'No Licence'])
            ->add('category',ChoiceType::class,[
                'choices'=> self::CATEGORIES

            ])
            ->add('epreuve',ChoiceType::class,['choices'=>self::EPREUVES,'multiple'=>true])
            ->add('submit',SubmitType::class,['label'=>'Ajouter les Epreuves'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Chien::class,
        ]);
    }
}
