<?php

namespace App\Form;

use App\Entity\Categories;
use App\Entity\Produits;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProduitsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle')
            ->add('prix')
            ->add('description')
            ->add('image')
            ->add('categories', EntityType::class, [
                'class' => Categories::class,
                'choice_label' => 'libelle', // Remplacez "nom" par le nom de la propriété à afficher dans la liste déroulante
                'placeholder' => 'Sélectionnez une catégorie', // Texte par défaut affiché dans la liste déroulante
                // Autres options spécifiques à EntityType
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produits::class,
        ]);
    }
}
