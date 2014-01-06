<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Acme\StoreBundle\Entity\Product;

use Symfony\Component\HttpFoundation\Response;

use Acme\StoreBundle\Entity\Category;

use Acme\StoreBundle\Entity\Author;

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
        /*$em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('AcmeStoreBundle:Product')
                ->find($id);
        
        if ( ! $product) {
            throw $this->createNotFoundException('No product ' . $id);
        }
        $product->setName('Basket');
        
        $em->flush();*/
       /* $product = $this->getDoctrine()->getRepository('AcmeStoreBundle:Product')->findOneByIdJonedToCategory(7);
        $category = $product->getCategory();
        $products = $category->getProducts();
        
        return $this->render('AcmeStoreBundle:Default:show.html.twig',
                array('products' => $products, 'category' => $category)
        );*/
        
        $author = new Author();
     
        $validation = $this->get('validator');
        $errors = $validation->validate($author);
        
        if ($errors->count() > 0) {
            $err = (string) $errors;
            
            return new Response($err);
        }
        
        return new Response('abc');
    }
    
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        
        $product = $em->getRepository('AcmeStoreBundle:Product')->find($id);
        
        $em->remove($product);
        $em->flush();
        
        return $this->redirect($this->generateUrl('acme_store_homepage',
                array('name' => 'tomek')
        ));
    }
    public function queryAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        //$product = $em->getRepository('AcmeStoreBundle:Product')->findOneByPrice('1.99');
     /*   $query = $em->createQuery('SELECT p FROM AcmeStoreBundle:Product p
            WHERE p.price = 1.99');*/
    /*   $repo = $this->getDoctrine()->getRepository('AcmeStoreBundle:Product');
        $query = $repo->createQueryBuilder('p')
                ->where('p.price = 1.99')
                ->getQuery();
        
        $products = $query->getResult();
      */  
        $products = $em->getRepository('AcmeStoreBundle:Product')->findAllByName();
        return $this->render('AcmeStoreBundle:Default:query.html.twig',
                array('products' => $products)
        );
    }
    public function createAction() 
    {
        $category = new Category();
        $category->setName('Sport');
        $category->setString('ss');
        
        $product = new Product();
        $product->setName('Saw');
        $product->setPrice(34.54);
        $product->setDescription('For lumberjack');
        $product->setCategory($category);
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($category);
        $em->persist($product);
        $em->flush();
        
        return new Response('aaa');
    }
}
