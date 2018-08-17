<?php

namespace GMF\DevisBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('surname', TextType::class, array('label' => 'Nom'))
            ->add('name',    TextType::class, array('label'  => 'Prénom'))
            ->add('company', TextType::class, array('required' => false, 'attr'=>array('placeholder'=> 'Votre entreprise')))
            ->add('siret',   TextType::class, array('required' => false, 'attr'=>array('placeholder'=>'Siret de votre entreprise')))
            ->add('adress',  TextType::class)
            ->add('zipCode', IntegerType::class)
            ->add('city',    TextType::class)
            ->add('email',   EmailType::class, array('attr'=>array('placeholder' => 'Votre e-mail')))
            ->add('email2',  EmailType::class, array('attr'=>array('placeholder' => 'Confirmer votre adresse e-mail')))
            ->add('phone',   TextType::class, array('attr' =>array('placeholder' => '09.23.48.87.00')))
            ->add('modules', ChoiceType::class, array(
                'choices' => array(
                    'Réservation' => 'reservation', 
                    'Fidélité clients' =>'fidelite',
                    'carte interactive' => 'carte',
                    'vente de produits'=> 'produits'),
                'expanded' => true,
                'multiple' => true))
            ->add('envoyer', SubmitType::class);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gmf_devisbundle_contact';
    }


}