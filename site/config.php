<?php
    /**
    * Site configuration, this file is changed by user per site.
    *
    */

    /*
    * Set level of error reporting
    */
    error_reporting(-1);
    ini_set('display_errors', 1);

   /**
    * Define the controllers, their classname and enable/disable them.
    *
    * The array-key is matched against the url, for example:
    * the url 'developer/dump' would instantiate the controller with the key "developer", that is
    * CCDeveloper and call the method "dump" in that class. This process is managed in:
    * $moss->FrontControllerRoute();
    * which is called in the frontcontroller phase from index.php.
    */
    $moss->config['controllers'] = array(
      'index'     => array('enabled' => true,'class' => 'CCIndex'),
    );
    
    /*
    * Define session name
    */
    $moss->config['session_name'] = preg_replace('/[:\.\/-_]/', '', $_SERVER["SERVER_NAME"]);

    /*
    * Define server timezone
    */
    $moss->config['timezone'] = 'Europe/Stockholm';

    /*
    * Define internal character encoding
    */
    $moss->config['character_encoding'] = 'UTF-8';

   /*
    * Define language
    */
    $moss->config['language'] = 'en';
    
   /** 
    * Settings for the theme.
    */
    $moss->config['theme'] = array(
      // The name of the theme in the theme directory
      'name'    => 'core',
    );