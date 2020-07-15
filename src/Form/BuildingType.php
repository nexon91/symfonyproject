<?php


namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class BuildingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('address',TextType::class)
            ->add('city',TextType::class)
            ->add('number',IntegerType::class, [
                'help' => 'Street number'
            ])
            ->add('windows',ChoiceType::class,[
                'choices' => [
                    'Yes' => 'Yes',
                    'No' => 'No'
                ],
                'help' => 'Windows washed - Yes or No'
            ])
            ->add('overtime',TextType::class)
            ->add('date_washed',DateType::class,[
                'widget' => 'single_text'
            ]);
    }



}