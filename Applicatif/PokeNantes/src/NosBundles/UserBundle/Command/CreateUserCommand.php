<?php

namespace NosBundles\UserBundle\Command;

//use FOS\UserBundle\Command\CreateUserCommand as BaseCommand;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use FOS\UserBundle\Model\User;

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
class CreateUserCommand extends ContainerAwareCommand
{
   /**
    * @see Command
    */
   protected function configure()
   {
       $this
           ->setName('fos:user:create')
           ->setDescription('Create a user.')
           ->setDefinition(array(
               new InputArgument('username', InputArgument::REQUIRED, 'The username'),
               new InputArgument('email', InputArgument::REQUIRED, 'The email'),
               new InputArgument('password', InputArgument::REQUIRED, 'The password'),
               new InputArgument('name', InputArgument::REQUIRED, 'The name'),
               new InputOption('super-admin', null, InputOption::VALUE_NONE, 'Set the user as super admin'),
               new InputOption('inactive', null, InputOption::VALUE_NONE, 'Set the user as inactive'),
           ))
           ->setHelp(<<<EOT
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
      $firsname       = $input->getArgument('firstname');
      $lastname       = $input->getArgument('lastname');
      $username       = $input->getArgument('username');
      //$email      = $input->getArgument('email');
      $password       = $input->getArgument('password');
      $inactive       = $input->getOption('inactive');
      $superadmin     = $input->getOption('super-admin');

      $manipulator = $this->getContainer()->get('userbundle.util.user_manipulator');
      $manipulator->create($username, $password, $email, $name, !$inactive, $superadmin);

       $output->writeln(sprintf('Created user <comment>%s</comment>', $username));
   }

   /**
    * @see Command
    */
   protected function interact(InputInterface $input, OutputInterface $output)
   {
       if (!$input->getArgument('username')) {
           $username = $this->getHelper('dialog')->askAndValidate(
               $output,
               'Please choose a username:',
               function($username) {
                   if (empty($username)) {
                       throw new \Exception('Username can not be empty');
                   }

                   return $username;
               }
           );
           $input->setArgument('username', $username);
       }

       /*if (!$input->getArgument('email')) {
           $email = $this->getHelper('dialog')->askAndValidate(
               $output,
               'Please choose an email:',
               function($email) {
                   if (empty($email)) {
                       throw new \Exception('Email can not be empty');
                   }

                   return $email;
               }
           );
           $input->setArgument('email', $email);
       }*/

       if (!$input->getArgument('password')) {
           $password = $this->getHelper('dialog')->askAndValidate(
               $output,
               'Please choose a password:',
               function($password) {
                   if (empty($password)) {
                       throw new \Exception('Password can not be empty');
                   }

                   return $password;
               }
           );
           $input->setArgument('password', $password);
       }

       if (!$input->getArgument('firstname')) {
           $firsname = $this->getHelper('dialog')->askAndValidate(
               $output,
               'Please choose a firsname:',
               function($firsname) {
                   if (empty($firsname)) {
                       throw new \Exception('Firstname can not be empty');
                   }

                   return $firstname;
               }
           );
           $input->setArgument('firstname', $name);
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
 }
