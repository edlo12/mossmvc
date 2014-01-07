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
        protected function RedirectTo($urlOrController=null, $metod=null) {
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
    header('Location: ' . $this->request->CreateUrl($urlOrController, $metod));
  }
  
        /**
         * Redirect to a method within the current controller. Defaults to index-method. Uses RedirectTo().
         *
          * @param string method name the method, default is index method.
         */
        protected function RedirectToController($method=null) {
    $this->RedirectTo($this->request->controller, $method);


        /**
         * Redirect to a controller and method. Uses RedirectTo().
         *
         * @param string controller name the controller or null for current controller.
         * @param string method name the method, default is current method.
         */
        protected function RedirectToControllerMethod($controller=null, $method=null) {
         $controller = is_null($controller) ? $this->request->controller : null;
         $method = is_null($method) ? $this->request->method : null;        
         $this->RedirectTo($this->request->CreateUrl($controller, $method));
  }


}