<?php
    /**
    * Holding a instance of CLydia to enable use of $this in subclasses.
    *
    * @package LydiaCore
    */
    class CObject {

       public $config;
       public $request;
       public $data;

       /**
        * Constructor
        */
       protected function __construct() {
        $moss = CMossmvc::Instance();
        $this->config   = &$moss->config;
        $this->request  = &$moss->request;
        $this->data     = &$moss->data;
      }

    }