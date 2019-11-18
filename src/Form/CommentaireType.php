<?php

namespace App\Form;

use App\Entity\Commentaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description')
            ->add('flag_solution')
            ->add('moyenne_benefice')
            ->add('moyenne_risque')
            ->add('objectif_de_soins')
            ->add('objectif_ethiques')
            ->add('modeles_de_soins')
            ->add('contectes_de_soin')
            ->add('methode_evaluation')
            ->add('date_mise_en_ligne')
            ->add('rating')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Commentaire::class,
        ]);
    }
}
