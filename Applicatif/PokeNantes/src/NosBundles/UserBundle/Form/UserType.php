<?php

namespace NosBundles\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        parent::buildForm($builder, $options);

        // Ajoutez vos champs ici
        $builder
            //->add('usrFirstname')
            //->add('usrLastname')
            ->add('usrLogin')
            ->add('usrPassword')
            //->add('usrKey')
        ;
    }

    /**
     *
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'NosBundles\UserBundle\Entity\User'
        ));
    }

    /**
     * Get Parent
     * Pour récupérer les champs par défaut de FosUser
     * @return fos_user_registration
     */
    /*public function getParent()
    {
        return 'fos_user_registration';
    }*/

    /**
     * Get Name
     * @return
     */
    public function getName()
    {
        return 'userbundle_user_registration';
    }
}
