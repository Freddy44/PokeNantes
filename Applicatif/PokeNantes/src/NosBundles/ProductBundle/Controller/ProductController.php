<?php

namespace NosBundles\ProductBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use NosBundles\ProductBundle\Entity\Product;
use NosBundles\ProductBundle\Repository\ProductRepository;
use NosBundles\ProductBundle\Form\ProductType;


/**
 * Product controller.
 *
 * @Route("/product")
 */
class ProductController extends Controller
{
    /**
     * Lists all Product entities.
     *
     * @Route("/", name="product_index")
     * @Method("GET")
     */
    public function indexAction()
    {

    	$em = $this->getDoctrine()->getManager();
      //$NameCategorie = '';
      if(isset($_GET['prod_cat'])){
            $NameCategorie = $_GET['prod_cat'];

            //die(var_dump($NameCategorie));
            /* Si on reçoit un nom de catégorie valide alors on recherche les Films de cette catégorie uniquement */
            if (!empty($NameCategorie)) {
                $products = $em->getRepository('NosBundlesProductBundle:Product')->findByprod_cat($NameCategorie);
            }

            if(empty($NameCategorie)){
                  $products = $em->getRepository('NosBundlesProductBundle:Product')->findAll();
            }
            return $this->render('NosBundlesProductBundle:product:show.html.twig', array(
                  'products' => $products,
              ));
      }

      return $this->redirect('NosBundlesProductBundle:product:index.html.twig');
      }

    /**
     * Creates a new Product entity.
     *
     * @Route("/new", name="product_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {

    	$product = new Product();
        $form = $this->createForm(new ProductType() , $product);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            return $this->redirectToRoute('product_show', array('id' => $product->getProdId()));
        }

         return $this->render('NosBundlesProductBundle:product:new.html.twig', array(
            'product' => $product,
            'form' => $form->createView()
        ));
    }

    /**
     * Finds and displays a Product entity.
     *
     * @Route("/{id}", name="product_show")
     * @Method("GET")
     */
    public function showAction(Product $product)
    {
        $deleteForm = $this->createDeleteForm($product);

        return $this->render('NosBundlesProductBundle:product:show.html.twig', array(
            'product' => $product,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Product entity.
     *
     * @Route("/{id}/edit", name="product_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Product $product)
    {
        $deleteForm = $this->createDeleteForm($product);
        $editForm = $this->createForm('NosBundles\ProductBundle\Form\ProductType', $product);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            return $this->redirectToRoute('product_edit', array('id' => $product->getProdId()));
        }

        return $this->render('NosBundlesProductBundle:product:edit.html.twig', array(
            'product' => $product,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Product entity.
     *
     * @Route("/{id}", name="product_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Product $product)
    {
        $form = $this->createDeleteForm($product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($product);
            $em->flush();
        }

        return $this->redirectToRoute('product_index');
    }

    /**
     * Creates a form to delete a Product entity.
     *
     * @param Product $product The Product entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Product $product)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('product_delete', array('id' => $product->getProdId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
