<?php

namespace NosBundles\ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/acceuil")
     */
    public function indexAction()
    {

        return $this->render('NosBundlesProductBundle:Template:connexion.html.twig');

    }
}
