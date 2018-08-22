<?php

namespace GMF\DevisBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
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
            ->add('surname', TextType::class, array('label' => 'Nom', 'attr'=>array('placeholder' => 'Votre nom')))
            ->add('name',    TextType::class, array('label'  => 'Prénom', 'attr'=>array('placeholder'=> 'Votre prénom')))
            ->add('company', TextType::class, array('required' => false, 'attr'=>array('placeholder'=> 'Votre entreprise')))
            ->add('siret',   TextType::class, array('required' => false, 'attr'=>array('placeholder'=>'Siret de votre entreprise')))
            ->add('adress',  TextType::class, array('attr'=>array('placeholder'=>"numero, rue")))
            ->add('zipCode', IntegerType::class, array('attr'=>array('placeholder'=>"Code Postal")))
            ->add('city',    TextType::class, array('attr'=>array('placeholder'=>"Ville")))
            ->add('email',   EmailType::class, array('attr'=>array('placeholder' => 'Votre e-mail')))
            ->add('email2',  EmailType::class, array('attr'=>array('placeholder' => 'Confirmer votre adresse e-mail')))
            ->add('phone',   TextType::class, array('attr' =>array('placeholder' => '09.23.48.87.00')))
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GMF\DevisBundle\Entity\Contact'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gmf_devisbundle_contact';
    }


}
