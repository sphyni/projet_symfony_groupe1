<?php

namespace App\Form;

use App\Entity\Participant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MonProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('pseudo')
            ->add('password', RepeatedType::class, [
                'type'            => PasswordType::class,
                'invalid_message' => 'confirmation du mot de passe ne correspond pas',
                'first_options'   => ['label' => 'password'],
                'second_options'  => ['label' => 'confirmation'],
            ])
            ->add('telephone')
            ->add('mail', EmailType::class, ['label' => 'Adresse Email'])
            ->add('isAdministrateur')
            ->add('isActif')
            ->add('site')
            ->add('sorties')
            ->add('sortiesOrganises')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Participant::class,
        ]);
    }
}
