<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NosBundles\UserBundle\Controller;

/*
use Doctrine\ORM\Mapping as ORM;
*/
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\Security;
use FOS\UserBundle\Controller\SecurityController as BaseController;

/**
*
* override FOS\UserBundle\Controller\SecurityController
*/
class SecurityController extends BaseController
{
    /**
     * @Route("/login")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function loginAction(Request $request)
    {
      $response = parent::loginAction($request);

      //si l'on désire qu'une personne identifiée ne réaccède pas à la page /login;
      /*if( $this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){

          $route = $this->container->get('router')->generate('UserBundle_index');
          return new RedirectResponse($route);
      }*/

      return $response;

    }

    /**
     * Renders the login template with the given parameters. Overwrite this function in
     * an extended controller to provide additional data for the login template.
     *
     * @param array $data
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function renderLogin(array $data)
    {
        return $this->render('NosBundlesUserBundle:Security:login.html.twig', $data);
    }



}
