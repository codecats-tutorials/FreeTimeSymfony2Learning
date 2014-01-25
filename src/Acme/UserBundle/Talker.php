<?php

namespace Acme\UserBundle;

/**
 * Description of Talker
 *
 * @author t
 */
class Talker {
    
    protected $surname;


    protected $name = 'Ferguson';
    
    public function __construct($p) 
    {
        $this->surname = $p;
    }
    
    public function getSurname()
    {
        return $this->surname;
    }
    
    public function sayHi() 
    {
        $name = $this->name;
        $this->name = 'Mateo';
        
        return $name . ' ' . $this->surname;
    }
}
