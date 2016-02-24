<?php

namespace NosBundles\UserBundle\Util;

use FOS\UserBundle\Model\UserManagerInterface;

/**
 * Executes some manipulations on the users
 *
 * @author Christophe Coevoet <stof@notk.org>
 * @author Luis Cordova <cordoval@gmail.com>
 */
class UserManipulator
{
    /**
     * User manager
     *
     * @var UserManagerInterface
     */
    private $userManager;

    public function __construct(UserManagerInterface $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * Creates a user and returns it.
     *
     * @param string  $username
     * @param string  $password
     * @param string  $email //not include
     * @param string  $firstname
     * @param string  $lastname
     * @param Boolean $active
     * @param Boolean $superadmin
     *
     * @return \FOS\UserBundle\Model\UserInterface
     */
    public function create($username, $password, $firstname, $lastname, $active, $superadmin)
    {
        $user = $this->userManager->createUser();
        $user->setUsername($username);
        //$user->setEmail($email);
        $user->setName($firstname);
        $user->setName($lastname);
        $user->setPlainPassword($password);
        $user->setEnabled((Boolean)$active);
        $user->setSuperAdmin((Boolean)$superadmin);
        $this->userManager->updateUser($user);

        return $user;
    }
}
