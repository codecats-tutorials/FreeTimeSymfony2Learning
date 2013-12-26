<?php

namespace Ssstrz\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
	
    public function indexAction($name, $surname)
    {    	
    	if ($name === 'aneta') {
            /*return $this->redirect(
                            $this->generateUrl('acme_hello_homepage', array('name'=>$name))
            );*/
            return $this->forward('AcmeHelloBundle:Hello:index', array(
                'name' => $name
            ));	
    	}
        
        if ($name === 'tomek') {
            $this->get('session')->getFlashBag()->add(
                'notice',
                'master has come'
            );
        }
        
        
   	$url = $this->generateUrl('ssstrz_test_homepage', array(
    		'name' => $name,
    		'surname' => $surname
    	));
    	
        return $this->render(
            'SsstrzTestBundle:Default:index.html.twig', 
            array(
                'name' 		=> $name, 
                'surname' 	=> $surname, 
                'url' 		=> $url
            )
        );
    }
}
