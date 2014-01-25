<?php

namespace Acme\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        $this->container->get('acme_user.talker')->sayHi();
        $name = $this->container->get('acme_user.talker')->sayHi();
        
        
        return $this->render('AcmeUserBundle:Default:index.html.twig', 
                array(
                    'name' => $name,
                    'surname' => $this->container->get('acme_user.talker')->getSurname()
                )
        );
    }
}
