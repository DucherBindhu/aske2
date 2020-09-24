<?php

namespace App\Form;

use App\Entity\Juges;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JugesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname',TextType::class,['label'=>'Nom'])
            ->add('lastname',TextType::class,['label'=>'Prenom'])
            ->add('description',TextareaType::class,['label'=>'Description'])
            ->add('imageFile',FileType::class,['label'=>'image'])
            ->add('submit',SubmitType::class,['label'=>'Ajout Juge'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Juges::class,
        ]);
    }
}
