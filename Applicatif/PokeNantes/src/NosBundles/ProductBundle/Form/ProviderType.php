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
        die('boum');
    	$builder
            
            ->add('provRef', 'text');

        ;
    }
/* ->add('provRef')   
 *  ->add('provName')
    ->add('provType')
    ->add('provPhone')
    ->add('ProductsList') */
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
