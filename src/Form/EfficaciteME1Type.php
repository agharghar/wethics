<?php

namespace App\Form;

use App\Entity\EfficaciteME;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EfficaciteME1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('risque')
            ->add('benefice')
            ->add('user')
            ->add('opinion')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EfficaciteME::class,
        ]);
    }
}
