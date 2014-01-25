<?php

use Acme\UserBundle\Talker;

namespace Acme\UserBundle;

/**
 * Description of GreeterManager
 *
 * @author t
 */
class GreeterManager {
    
    /**
     *
     * @var Talker
     */
    protected $talker;


    public function __construct(Talker $talker) 
    {
        $this->talker = $talker;
    }
    
    public function getTalker() 
    {
        return $this->talker;
    }
}
