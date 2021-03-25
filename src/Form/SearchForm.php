<?php


namespace App\Form;




use App\Entity\Site;
use App\Entity\Sortie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class SearchForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('r', TextType::class,[
                    'label' => 'Le nom de la sortie contient : ',
                    'required' => false,

                    'attr' => [
                        'placeHolder' => 'Rechercher'
                    ]
                    ])

            ->add('site' ,EntityType::class,[
                'label'=> 'Site : ',
                'required'=> false,
                'class'=> Site::class,
                //'expanded' => true,
                //'multiple' => true,
            ])




        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
      //  parent::configureOptions($resolver);
      $resolver->setDefaults([
        'data_class' => Sortie::class,
        'method' => 'GET',
        'crsf_protection' =>false
      ] );
    }

public function getBlockPrefix()
{
    return '';
}
}
