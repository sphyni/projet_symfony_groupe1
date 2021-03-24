<?php

namespace App\Form;

use App\Entity\Participant;
use App\Entity\Site;
use App\Repository\SiteRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModificationUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('username')
            ->add('Prenom')
            ->add('Nom')
            ->add('Telephone')
            ->add('Mail')
           ->add('site', GestionSiteType::class)
            ->add('password', RepeatedType::class, [
                'type'           =>PasswordType::class,
                'invalid_message'=>'La confirmation du mot de passe est fausse',
                'required'       =>true,
                'first_options'  =>['label'=>'Mot de passe'],
                'second_options'  =>['label' =>'confirmation'],
            ])
            ->add('modifier',SubmitType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Participant::class,
        ]);
    }
}
