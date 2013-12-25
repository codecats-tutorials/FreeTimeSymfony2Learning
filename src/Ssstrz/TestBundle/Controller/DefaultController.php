<?php

namespace Ssstrz\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name, $surname)
    {
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
