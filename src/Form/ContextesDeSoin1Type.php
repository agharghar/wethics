<?php

namespace App\Form;

use App\Entity\ContextesDeSoin;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContextesDeSoin1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('contexte_de_soin')
            ->add('opinion')
            ->add('probleme')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ContextesDeSoin::class,
        ]);
    }
}
