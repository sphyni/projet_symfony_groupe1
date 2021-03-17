<?php

namespace App\Form;

use App\Entity\Sortie;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateSortiesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class, [
                'label'=>'Nom de la sortie : ',
                'required' => true,
            ])
            ->add('dateHeureDebut', DateTimeType::class, [
                'label'=>'Date et heure de la sortie : ',
                'required' => true,
            ])
            ->add('dateLimiteInscription',DateType::class,[
                'label'=>"Date limite d'inscription : ",
                'required'=> true,
            ])
            ->add('nbInscriptionsMax',IntegerType::class,[
                'label'=>'Nombre de places : ',
                'required'=> true,
            ])
            ->add('duree',TimeType::class,[
                'label'=>'Durée : ',
                'required'=> true,
            ])
            ->add('infosSortie',TextareaType::class,[
                'label'=>'Description et infos : ',
                'required'=> true,
            ])
            ->add('historique',HiddenType::class)
            ->add('etat',HiddenType::class)
            ->add('lieu',HiddenType::class)
            ->add('site',HiddenType::class)
            //->add('inscrits',HiddenType::class)
            ->add('save', SubmitType::class,['label'=>'Enregistrer'])
            ->add('add', SubmitType::class, ['label'=>'Publier la sortie'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Sortie::class,
        ]);
    }
}
