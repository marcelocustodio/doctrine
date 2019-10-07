<?php

namespace App\Core\MVC\Model;

class BaseModel {

    protected $significantAttribute;
    
    public function __construct(string $significantAttribute = null) {
        
        if ( isset($significantAttribute) ) {
            $this->significantAttribute = $significantAttribute;
        } else {
            $this->significantAttribute = 'id';
        }
        
    }
}
