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
$menu = array(
'index', 'developer', 'developer/links',
'developer/display-object', 'guestbook',
'content',
'user', 'user/profile','user/create', 'acp',
);

    $this->views->SetTitle('Index Controller');
    $this->views->AddInclude(__DIR__ . '/index.tpl.php', array('menu'=>$menu));
  }

} 