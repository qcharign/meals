<?php

namespace App\Form;

use App\Entity\Department;
use App\Entity\Ingredient;
use App\Entity\Unit;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IngredientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add("department", EntityType::class, [
                "label" => "Rayon",
                "class" => Department::class,
                "choice_label" => fn(Department $department) => ucfirst($department->getName()),
            ])
            ->add("name", TextType::class, [
                "label" => "Nom",
                "attr" => ["placeholder" => "Tapez le nom de l'ingrédient"],
            ])
            ->add("default_unit", EntityType::class, [
                "label" => "Unité",
                "class" => Unit::class,
                "choice_label" => fn(Unit $unit) => ucfirst($unit->getName()),
            ])
            ->add("breakable_default_unit", CheckboxType::class, [
                "label" => "Unité sécable",
                "required" => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ingredient::class,
        ]);
    }
}
