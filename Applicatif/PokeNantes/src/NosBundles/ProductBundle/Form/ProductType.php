<?php

namespace NosBundles\ProductBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prodRef','text',array('label'=>'Reference du produit : '))
            ->add('prodName','text',array('label'=>'Nom du produit : '))
            ->add('prodCat','text',array('label'=>'Categorie de produit : '))
            ->add('prodDesc','text',array('label'=>'Descriptif : '))
            ->add('prodState', 'choice', array('choices' => array('O'=>'Occasion','N'=>'Neuf'),'label'=>'Etat : '))
            ->add('prodPicture', 'file')
            ->add('prodQty','text',array('label'=>'Quantite : '))
            ->add('ProvidersList','text',array('label'=>'Fournisseurs : '))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'NosBundles\ProductBundle\Entity\Product'
        ));
    }
}
