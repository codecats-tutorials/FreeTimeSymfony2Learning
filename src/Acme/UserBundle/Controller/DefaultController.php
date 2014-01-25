<?php

namespace Acme\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        $greeter = $this->container->get('acme_user.greeter');
        $greeter->getTalker()->sayHi();
        $name = $greeter->getTalker()->sayHi();
        
        
        return $this->render('AcmeUserBundle:Default:index.html.twig', 
                array(
                    'name' => $name,
                    'surname' => $greeter->getTalker()->getSurname()
                )
        );
    }
}
