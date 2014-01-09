<?php

namespace Acme\TaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Acme\TaskBundle\Entity\Task;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeTaskBundle:Default:index.html.twig', array('name' => $name));
    }
    
    public function newAction()
    {
        $task = new Task();
        $task->setTask('ab');
        $task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($task)
                ->add('task', 'text')
                ->add('dueDate', 'date')
                ->add('save', 'submit')
                ->add('saveAs', 'submit')
                ->getForm();
        
        $form->handleRequest($this->getRequest());
        
        if ($form->isValid()) {
            $res = 'save';
            if ($form->get('saveAs')->isClicked()) $res = 'saveAS';
            return $this->redirect($this->generateUrl('acme_task_homepage',
                    array('name' => $res)
            ));
        }
        
        return $this->render('AcmeTaskBundle:Default:new.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
