<?php

namespace App\Form;

use App\Entity\Product;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Constraints\PositiveOrZero;

class ProductFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //permet d'ajouter un champ,le nom du class, options(notBlank= le champs ne doit pas être vide, email,

            ->add('name',TextareaType::class,[
                'constraints'=>[
                    new NotBlank(['message'=>'Veuillez indiquer un nom.']),
                    new Length([
                        'max'=>255,
                        'maxMessage'=>'Le nom ne peut contenir plus de 255 caractères'
                    ])

                ]
            ])
            ->add('description',TextareaType::class,[
                'required'=>false,
                'help'=>'Ce champs est facultatif.'


            ])
            ->add('price',MoneyType::class,[
                'constraints'=>[
                    new NotBlank(['message'=>'Veuillez indiquer un prix']),
                    new Positive(['message'=>'le prix doit être positif'])
                ]
            ])
            ->add('quantity',IntegerType::class,[
                'constraints'=>[
                    new NotBlank(['message'=>'Veuillez indiquer une quantité.']),
                    new PositiveOrZero(['message'=>'le prix ne doit pas être negative'])
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
