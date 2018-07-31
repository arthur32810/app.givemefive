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
            ->add('surname', TextType::class)
            ->add('name',    TextType::class)
            ->add('company', TextType::class)
            ->add('siret',   TextType::class)
            ->add('adress',  TextType::class)
            ->add('zipCode', IntegerType::class)
            ->add('city',    TextType::class)
            ->add('email',   EmailType::class)
            ->add('phone',   IntegerType::class);
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
