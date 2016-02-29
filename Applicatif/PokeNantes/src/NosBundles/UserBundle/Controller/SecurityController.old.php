<?php

namespace NosBundles\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Mapping as ORM;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use NosBundles\UserBundle\User;
use FOSUserBundle\Controller\SecurityController as secu;

class SecurityController extends Controller
{
  /**
     * @Route("/login", name="UserBundle_login")
     */
    public function loginAction(Request $request)
    {
      //parent::loginAction($request);

      /** @var $session \Symfony\Component\HttpFoundation\Session\Session */
      $session = $request->getSession();

      if (class_exists('\Symfony\Component\Security\Core\Security')) {
          $authErrorKey = Security::AUTHENTICATION_ERROR;
          $lastUsernameKey = Security::LAST_USERNAME;
      } else {
          // BC for SF < 2.6
          $authErrorKey = SecurityContextInterface::AUTHENTICATION_ERROR;
          $lastUsernameKey = SecurityContextInterface::LAST_USERNAME;
      }

      // get the error if any (works with forward and redirect -- see below)
      if ($request->attributes->has($authErrorKey)) {
          $error = $request->attributes->get($authErrorKey);
      } elseif (null !== $session && $session->has($authErrorKey)) {
          $error = $session->get($authErrorKey);
          $session->remove($authErrorKey);
      } else {
          $error = null;
      }

      if (!$error instanceof AuthenticationException) {
          $error = null; // The value does not come from the security component.
      }

      // last username entered by the user
      $lastUsername = (null === $session) ? '' : $session->get($lastUsernameKey);

      if ($this->has('security.csrf.token_manager')) {
          $csrfToken = $this->get('security.csrf.token_manager')->getToken('authenticate')->getValue();
      } else {
          // BC for SF < 2.4
          $csrfToken = $this->has('form.csrf_provider')
              ? $this->get('form.csrf_provider')->generateCsrfToken('authenticate')
              : null;
      }

      /**Begin override */
      $authenticationUtils = $this->get('security.authentication_utils');

      // get the login error if there is one
      $error = $authenticationUtils->getLastAuthenticationError() ? $authenticationUtils->getLastAuthenticationError() : "";

      // last username entered by the user
      $lastUsername = $authenticationUtils->getLastUsername();

      //test
      /*if( $this->container->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED') ){

            // IS_AUTHENTICATED_FULLY also implies IS_AUTHENTICATED_REMEMBERED, but IS_AUTHENTICATED_ANONYMOUSLY doesn't

            return new RedirectResponse($this->container->get('router')->generate('NosBundlesUserBundle:Security:login.html.twig', array()));
            // of course you don't have to use the router to generate a route if you want to hard code a route
        }
        /**End override */
        $error = "";

      return $this->renderLogin(

          array(
              // last username entered by the user
              'last_username' => $lastUsername,
              'error'         => $error,
              'csrf_token'              => $csrfToken,
          )
      );
    }

    /**
       * @Route("/login_check", name="UserBundle_loginCheck")
       */
      public function loginCheckAction()
      {

        $user = $this->container->get('security.context')->getToken()->getUser();

        return $this->render(
            'NosBundlesUserBundle:Default:index.html.twig',
            array(
              //var_dump($user),
              'user' => $user,
                // last username entered by the user
                //'last_username' => $lastUsername,
                'error'         => $error,
            )
        );
      }

      public function renderLogin(array $data)
      {
        //parent::renderLogin($data);
          return $this->render('NosBundlesUserBundle:Security:login.html.twig',$data);
      }
}
