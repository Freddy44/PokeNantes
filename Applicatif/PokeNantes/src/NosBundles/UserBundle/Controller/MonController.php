<?php

namespace NosBundles\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class MonController extends Controller
{
    /**
     * @Route("/mapage", name="UserBundle_page")
     */
    public function indexAction()
    {

      $user = $this->container->get('security.context')->getToken()->getUser();

      return $this->render('NosBundlesUserBundle:Default:mapage.html.twig',array(var_dump($user))  );

    }
}
