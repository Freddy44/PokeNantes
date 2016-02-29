<?php

namespace NosBundles\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstname')
                ->add('lastname')
                ->add('roles', 'collection', array(
                   'type' => 'choice',
                   'options' => array(
                       'label' => false, /* Ajoutez cette ligne */
                       'choices' => array(
                           'ROLE_ADMIN' => 'ROLE_ADMIN',
                           'ROLE_USER' => 'ROLE_USER'
                       )
                     )
                   )
                );
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    // For Symfony 2.x
    public function getFirstname()
    {
        return $this->getBlockPrefix();
    }

    public function getLastname()
    {
        return $this->getBlockPrefix();
    }
}
