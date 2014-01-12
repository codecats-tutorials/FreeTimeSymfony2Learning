<?php

namespace Acme\TaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Acme\TaskBundle\Entity\Task,
    Acme\TaskBundle\Form\Type\TaskType;

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

        /*
        $form = $this->createFormBuilder($task)
                ->add('task', 'text')
                ->add('dueDate', 'date')
                ->add('save', 'submit')
                ->add('saveAs', 'submit')
                ->getForm();*/
        $form = $this->createForm('task', $task);
        
        $form->handleRequest($this->getRequest());
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();
            
            return $this->redirect($this->generateUrl('acme_task_homepage',
                    array('name' => 'ok')
            ));
        }
        
        return $this->render('AcmeTaskBundle:Default:new.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
