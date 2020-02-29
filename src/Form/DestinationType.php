<?php

namespace App\Form;

use App\Entity\Country;
use App\Entity\Destination;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DestinationType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('city', TextType::class, [
        'label' => 'Name of the city',
        'label_attr' => [
          'class' => 'pr-3'
        ]
      ])
      ->add('country', EntityType::class, [
        'class' => Country::class,
        'choice_label' => 'name',
        'label' => 'Destination\'s country'
      ]);
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults([
      'data_class' => Destination::class,
    ]);
  }
}
