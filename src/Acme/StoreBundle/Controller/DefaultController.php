<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Acme\StoreBundle\Entity\Product;

use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        $product = new Product();
        
        $product->setName('Ball');
        $product->setPrice('1.99');
        $product->setDescription('Rugby ball');
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->flush();
        
        return $this->render('AcmeStoreBundle:Default:index.html.twig',
                array('id' => $product->getId())
        );
    }
    
    public function showAction($id) 
    {
        $product = $this->getDoctrine()
                ->getRepository('AcmeStoreBundle:Product')
                ->find($id);
        
        if ( ! $product) {
            throw $this->createNotFoundException('No product ' . $id);
        }
        
        return $this->render('AcmeStoreBundle:Default:show.html.twig',
                array('product' => $product)
        );
    }
}
