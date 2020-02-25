<?php

namespace ReclamationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReclamationsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre', null, ['label'=> false, 'attr'=> ['class'=> 'form-control orm-control-user']])
            ->add('nom', null, ['label'=> false, 'attr'=> ['class'=> 'form-control orm-control-user']])
            ->add('email', null, ['label'=> false, 'attr'=> ['class'=> 'form-control orm-control-user']])
            ->add('tel', null, ['label'=> false, 'attr'=> ['class'=> 'form-control orm-control-user']])
            ->add('description', null, ['label'=> false, 'attr'=> ['class'=> 'form-control orm-control-user']]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ReclamationBundle\Entity\Reclamations'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'reclamationbundle_reclamations';
    }


}
