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
       public $views;
       public $session;

       /**
        * Constructor
        */
       protected function __construct() {
        $moss = CMossmvc::Instance();
        $this->config   = &$moss->config;
        $this->request  = &$moss->request;
        $this->data     = &$moss->data;
        $this->db       = &$moss->db;
        $this->views    = &$moss->views;
        $this->session  = &$moss->session;
      }
      
        /**
         * Redirect to another url and store the session
         */
        protected function RedirectTo($url) {
         $moss = CMossmvc::Instance();
    if(isset($moss->config['debug']['db-num-queries']) && $moss->config['debug']['db-num-queries'] && isset($moss->db)) {
      $this->session->SetFlash('database_numQueries', $this->db->GetNumQueries());
    }
    if(isset($moss->config['debug']['db-queries']) && $moss->config['debug']['db-queries'] && isset($moss->db)) {
      $this->session->SetFlash('database_queries', $this->db->GetQueries());
    }
    if(isset($moss->config['debug']['timer']) && $moss->config['debug']['timer']) {
         $this->session->SetFlash('timer', $moss->timer);
    }
    $this->session->StoreInSession();
    header('Location: ' . $this->request->CreateUrl($url));
  }


}