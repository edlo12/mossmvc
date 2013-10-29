<?php
   /**
    * Main class for Mossmvc, holds everything.
    *
    * @package MossmvcCore
    */
    class CMossmvc implements ISingleton {

       private static $instance = null;
       
       /**
        * Constructor
        */
       protected function __construct() {
          // include the site specific config.php and create a ref to $moss to be used by config.php
          $moss = &$this;
          require(MOSSMVC_SITE_PATH.'/config.php');
       }
       /**
        * Singleton pattern. Get the instance of the latest created object or create a new one.
        * @return CMossmvc The instance of this class.
        */
       public static function Instance() {
          if(self::$instance == null) {
             self::$instance = new CMossmvc();
          }
          return self::$instance;
       }
       
       /**
        * Frontcontroller, check url and route to controllers.
        */
      public function FrontControllerRoute() {
        $this->data['debug']  = "REQUEST_URI - {$_SERVER['REQUEST_URI']}\n";
        $this->data['debug'] .= "SCRIPT_NAME - {$_SERVER['SCRIPT_NAME']}\n";
      }
      
       /**
        * Theme Engine Render, renders the views using the selected theme.
        */
      public function ThemeEngineRender() {
        echo "<h1>I'm CMossmvc::ThemeEngineRender</h1><p>You are most welcome. Nothing to render at the moment</p>";
        echo "<pre>", print_r($this->data, true) . "</pre>";
      }
      
    }