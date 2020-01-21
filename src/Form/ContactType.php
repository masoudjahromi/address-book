<?php

namespace App\Form;

use App\Entity\City;
use App\Entity\Contact;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('first_name')
            ->add('last_name')
            ->add('full_address')
            ->add('zip_code')
            ->add('phone_number')
            ->add('birthday', DateType::class, [
                'placeholder' => [
                    'year' => 'Year', 'month' => 'Month', 'day' => 'Day'
                ],
                'years' => range(1880, 2020),
            ])->add('city', EntityType::class, [
                'class' => City::class,
                'choice_label' => function ($city) {
                    /**
                     * @var City $city
                     */
                    return $city->getName() . ' - ' . $city->getCountry()->getName();
                }
            ])
            ->add('email');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
