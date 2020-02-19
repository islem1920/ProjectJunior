<?php

namespace MedcinBundle\Form;

use MedcinBundle\Entity\Enfant;
use MedcinBundle\Entity\Medcin;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConsultationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('dateConst')
            ->add('medcin',EntityType::class,array('class'=>Medcin::class,'choice_label'=>'nom','multiple'=>false))
            ->add('enfant',EntityType::class,array('class'=>Enfant::class,'choice_label'=>'nom','multiple'=>false))
            ->add('Valider',SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MedcinBundle\Entity\Consultation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'medcinbundle_consultation';
    }


}
