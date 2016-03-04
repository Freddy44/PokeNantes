<?php

namespace NosBundles\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class UserController extends Controller
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

        //return $this->render('NosBundlesUserBundle:Default:index.html.twig',array(var_dump($user))  );
        return $this->redirect($this->generateUrl("product_index"));
      }else{
        // fait une redirection vers une page définie par le routeur
        return $this->redirect($this->generateUrl("fos_user_security"));
      }

    }
}
