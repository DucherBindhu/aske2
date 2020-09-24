<?php

namespace App\Form;

use App\Entity\Chien;
use Faker\Provider\Text;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenom',TextType::class,['label'=>'Nom Chien'])
            ->add('race',TextType::class,['label'=>'Race Du Chien'])
            ->add('licence',NumberType::class,['label'=>'No Licence'])
            ->add('category',ChoiceType::class,[
                'choices'=> [
                    'Epreuve 1' => 'epreuve_1',
                    'Epreuve 2' => 'epreuve_2',
                    'Epreuve 3' => 'epreuve_3',
                ]
            ])
            ->add('submit',SubmitType::class,['label'=>'Ajouter les Epreuves']);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Chien::class,
        ]);
    }
}
