<?php

namespace App\Form;

use App\Entity\Products;
use DateTime;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\File;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProductsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label'=>'Nom du produit',
            ])
            ->add('description', TextareaType::class, [
                'label'=>'Description',
            ])
            ->add('image', TextType::class, [
                'label'=>'Image',
                'mapped'=> false,
                'required'=> false,
            ])
            ->add('longueur', TextType::class, [
                'label'=>'Longueur',
            ])
            ->add('hauteur', TextType::class, [
                'label'=>'Hauteur'
            ])
            ->add('profondeur', TextType::class, [
                'label'=>'Profondeur',
            ])
            ->add('poids', TextType::class, [
                'label'=>'Poids',
            ])
            ->add('composition', TextareaType::class, [
                'label'=>'Composition'
            ])
            ->add('online', CheckboxType::class, [
                'label'=>'Mise en ligne',
            ])
            ->add('imageFile', VichFileType::class, [
                
            ]);
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Products::class,
        ]);
    }
}
