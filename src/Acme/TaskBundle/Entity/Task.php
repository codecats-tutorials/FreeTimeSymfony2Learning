<?php
namespace Acme\TaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Task 
{
    /**
     * @ORM\Id
     */
    protected $task;
    
    /**
     * @ORM\Colum(type="string")
     */
    protected $dueDate;
}
