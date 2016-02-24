<?php

namespace NosBundles\UserBundle\Command;

//use FOS\UserBundle\Command\CreateUserCommand as BaseCommand;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand as BaseCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use FOS\UserBundle\Model\User;
/*
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use FOS\UserBundle\Command\CreateUserCommand as BaseCommand;*/

/**
* @author Matthieu Bontemps <matthieu@knplabs.com>
* @author Thibault Duplessis <thibault.duplessis@gmail.com>
* @author Luis Cordova <cordoval@gmail.com>
*/

/**
 * CreateUserCommand
 *
 * Elle surcharge la classe FOS\UserBundle\Command\CreateUserCommand.
 * Cette dernière permet de lancer les commandes en ligne de commandes.
 *  php app/console fos:user:CreateUser
 *
 * Surcharge des attributs de la table User: usr_lastname et usr_firstname
 *
 * @src: http://blog.overnetcity.com/2012/10/15/symfony2-fosuserbundle-comment-etendre-la-commande-par-defaut-de-creation-dun-utilisateur/
 *
*/
class CreateUserCommand extends BaseCommand
{
    /**
     * @see Command
     */
    protected function configure()
    {
        parent::configure();
        $this
            ->setName('NosBundles:UserBundle:user:create')
            ->getDefinition()->addArguments(array(
                new InputArgument('firstname', InputArgument::REQUIRED, 'The firstname'),
                new InputArgument('lastname', InputArgument::REQUIRED, 'The lastname')
            ))
        ;
        $this->setHelp(<<<EOT
// L'aide qui va bien
The <info>fos:user:create</info> command creates a user:
   <info>php app/console fos:user:create matthieu</info>
This interactive shell will ask you for an email and then a password.
You can alternatively specify the email and password as the second and third arguments:
 <info>php app/console fos:user:create matthieu matthieu@example.com mypassword</info>

You can create a super admin via the super-admin flag:

 <info>php app/console fos:user:create admin --super-admin</info>

You can create an inactive user (will not be able to log in):

 <info>php app/console fos:user:create thibault --inactive</info>

EOT
            );
    }

    /**
     * @see Command
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $firstname  = $input->getArgument('firstname');
        $lastname   = $input->getArgument('lastname');
        $username   = $input->getArgument('username');
        $email      = $input->getArgument('email');
        $password   = $input->getArgument('password');
        $inactive   = $input->getOption('inactive');
        $superadmin = $input->getOption('super-admin');

        /** @var \FOS\UserBundle\Model\UserManager $user_manager */
        $user_manager = $this->getContainer()->get('fos_user.user_manager');

        /** @var \Acme\AcmeUserBundle\Entity\User $user */
        $user = $user_manager->createUser();
        $user->setUsername($username);
        $user->setEmail($email);
        $user->setPlainPassword($password);
        $user->setEnabled((Boolean) !$inactive);
        $user->setSuperAdmin((Boolean) $superadmin);
        $user->setFirstName($firstname);
        $user->setLastName($lastname);

        $user_manager->updateUser($user);

        $manipulator = $this->getContainer()->get('userbundle.util.user_manipulator');
        $manipulator->setFirstName($firstname);
        $manipulator->setLastName($lastname);
        $manipulator->create($username, $password, $email, $name, !$inactive, $superadmin);

        $output->writeln(sprintf('Created user <comment>%s</comment>', $username));
    }

    protected function interact(InputInterface $input, OutputInterface $output)
    {
        parent::interact($input, $output);
        if (!$input->getArgument('firstname')) {
            $firstname = $this->getHelper('dialog')->askAndValidate(
                $output,
                'Please choose a firstname:',
                function($firstname) {
                    if (empty($firstname)) {
                        throw new \Exception('Firstname can not be empty');
                    }

                    return $firstname;
                }
            );
            $input->setArgument('firstname', $firstname);
        }
        if (!$input->getArgument('lastname')) {
            $lastname = $this->getHelper('dialog')->askAndValidate(
                $output,
                'Please choose a lastname:',
                function($lastname) {
                    if (empty($lastname)) {
                        throw new \Exception('Lastname can not be empty');
                    }

                    return $lastname;
                }
            );
            $input->setArgument('lastname', $lastname);
        }
    }
    // ...
}
