<?php
    /**
    * Standard controller layout.
    *
    * @package MossmvcCore
    */
class CCIndex extends CObject implements IController {

   /**
    * Constructor
    *
    **/
     public function __construct() {
       parent::__construct();
     }
   
   /**
    * Implementing interface IController. All controllers must have an index action.
    */
      public function Index() {   
         $this->Menu();
      }


        /**
         * Create a method that shows the menu, same for all methods
         */
        private function Menu() {        
                $moss = CMossmvc::Instance();
                $menu = array('index', 'index/index', 'developer', 'developer/index', 'developer/links', 'developer/display-object','guestbook');
                
                $html = null;
                foreach($menu as $val) {
                 $html .= "<li><a href='" . $this->request->CreateUrl($val) . "'>$val</a>";
                }
                
                $moss->data['title'] = "The Index Controller";
                $moss->data['main'] = <<<EOD
<h1>The Index Controller</h1>
<p>This is what you can do for now:</p>
<ul>
$html
</ul>
EOD;
  }
  
} 