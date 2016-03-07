<?php

namespace NosBundles\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="UserBundle_index")
     *
     * @return template et array('user')
     */
    public function indexAction()
    {
      // savoir si un user est authentifié :
      if($this->get('security.context')->getToken()->isAuthenticated()){
        /* Pour récupérer les infos concernant le user */
        $user = $this->container->get('security.context')->getToken()->getUser();

        return $this->render('NosBundlesProductBundle:product:index.html.twig',array($user)  );
      }else{
        // fait une redirection vers une page définie par le routeur
        return $this->redirect($this->generateUrl("fos_user_security"));
      }

    }
}
