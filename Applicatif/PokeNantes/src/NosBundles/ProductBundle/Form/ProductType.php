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
            ->add('prodCat','choice',array('choices' => array(
                                           'vetements' => 'Vêtements',
                                           'deguisement' => 'Déguisements',
                                           'jeux' => 'Jeux vidéos',
                                           'livres' => 'Livres',
                                           'dvd' => 'DVD',
                                           'cd' => 'CD',
                                           'figurines' => 'Figurines',
                                           'cartes' => 'Cartes de collection',),
                                           'label'=>'Categorie de produit : '))
            ->add('prodDesc','textarea',array('label'=>'Descriptif : '))
            ->add('prodState', 'choice', array('choices' => array('Occasion'=>'Occasion','Neuf'=>'Neuf'),'label'=>'Etat : '))
            ->add('prodPicture', 'text')
            ->add('prodQty', 'integer', array('label'=>'Quantite : '))
            ->add('prodQtyDefect', 'integer', array('label'=>'Quantite defectueuse: '))
            ->add('ProvidersList', 'entity', array(

            		'class'    => 'NosBundlesProductBundle:Provider',

            		'property' => 'provName',

            		'multiple' => true

            ));
        ;
    }
     //            ->add('ProvidersList' , 'collection', ['type' => new ProviderType(),'allow_add'    => true, 'allow_delete' => true])


}
