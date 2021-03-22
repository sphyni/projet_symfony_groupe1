<?php

namespace App\Form;

use App\Entity\Etat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateEtatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle', ChoiceType::class,[
                'label'     => 'Etat de la sortie : ',
                'choices'   => [
                    'Créée'             => 1,
                    'Ouverture'         => 2,
                    //'Cloturée'          => 3,
                    //'Activé en cours'   => 4,
                    //'Passé'             => 5,
                    //'Annulée'           => 6,
                ],
            ])
            ->add('save', SubmitType::class, ['label' => 'Enregistrer'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Etat::class,
        ]);
    }
}
