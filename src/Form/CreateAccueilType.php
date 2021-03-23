<?php

namespace App\Form;

use App\Entity\Etat;
use App\Entity\Sortie;
use Doctrine\ORM\Query\AST\Join;
use Doctrine\ORM\Query\AST\JoinAssociationDeclaration;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateAccueilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            //->add('dateLimiteInscription')
            //->add('duree')
            ->add('dateHeureDebut')
            //->add('nbInscriptionsMax')
            //->add('infosSortie')
            //->add('historique')



            ->add('Rechercher', SubmitType::class)
            //->add('lieu')
            //->add('site')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Sortie::class,
        ]);
    }
}
