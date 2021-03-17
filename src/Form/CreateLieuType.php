<?php

namespace App\Form;

use App\Entity\Lieu;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateLieuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('idLieu')
            ->add('nom',ChoiceType::class, [
                'label'=>'Lieu : ',
                    'choices'=>['yes'=>true ,'no'=>false,
                        'required'=>true]]
            //Créer une requête select pour afficher dynamiquement des le choix dans la liste déroulante
            )
            ->add('rue', TextType::class, [
                'label'=>'Rue : ',
                'required'=>true
            ])
            ->add('latitude', TextType::class, [
                'label'=>'Latitude : ',
                'required'=> true
            ],)
            ->add('longitude', TextType::class, [
                'label'=>'Longitude : ',
                'required'=>true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Lieu::class,
        ]);
    }
}
