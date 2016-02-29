<?php

namespace NosBundles\ProductBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProviderType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

    	$builder
            
            ->add('provRef', 'text', array('disabled' => true ))
            ->add('provName', 'text', array('disabled' => true ))
            ->add('provType', 'text', array('disabled' => true ))
            ->add('provPhone', 'text', array('disabled' => true ))
        ;
    }
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'NosBundles\ProductBundle\Entity\Provider'
        ));
    }
}
