<?php
    /**
    * Holding a instance of CMossmvc to enable use of $this in subclasses.
    *
    * @package MossmvcCore
    */
class CObject {

       public $config;
       public $request;
       public $data;
       public $db;

       /**
        * Constructor
        */
       protected function __construct() {
        $moss = CMossmvc::Instance();
        $this->config   = &$moss->config;
        $this->request  = &$moss->request;
        $this->data     = &$moss->data;
        $this->db       = &$moss->db;
      }
}
    