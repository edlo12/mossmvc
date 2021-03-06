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
     * Set what to show as debug or developer information in the get_debug() theme helper.
     */
    

    
    $moss->config['debug']['mossmvc'] = false;
    $moss->config['debug']['db-num-queries'] = true;
    $moss->config['debug']['db-queries'] = true;    
    $moss->config['debug']['session'] = false;
    $moss->config['debug']['timer'] = true;

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
      'developer' => array('enabled' => true,'class' => 'CCDeveloper'),
      'guestbook' => array('enabled' => true,'class' => 'CCGuestbook'),
      'user'      => array('enabled' => true,'class' => 'CCUser'),
      'content'   => array('enabled' => true,'class' => 'CCContent'),
      'blog'      => array('enabled' => true,'class' => 'CCBlog'),
      'page'      => array('enabled' => true,'class' => 'CCPage'),
      'acp'       => array('enabled' => true,'class' => 'CCAdminControlPanel'),
    );

   /*
    * How to hash password of new users, choose from: plain, md5salt, md5, sha1salt, sha1.
    */
   
    $moss->config['hashing_algorithm'] = 'sha1salt';
    
   /*
    * Define session name
    */
   
    $moss->config['session_name'] = preg_replace('/[:\.\/-_]/', '', __DIR__);
    $moss->config['session_key']  = 'mossmvc';
    
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
    
   /**
    * Set a base_url to use another than the default calculated
    */
   
    $moss->config['base_url'] = null;
    
   /**
    * What type of urls should be used?
    *
    * default      = 0      => index.php/controller/method/arg1/arg2/arg3
    * clean        = 1      => controller/method/arg1/arg2/arg3
    * querystring  = 2      => index.php?q=controller/method/arg1/arg2/arg3
    */
   
    $moss->config['url_type'] = 1;
    
    
    /**
    * Set database(s).
    */
   
    $moss->config['database'][0]['dsn'] = 'sqlite:' . MOSSMVC_SITE_PATH . '/data/.ht.sqlite';
    
    
   /**
    * Allow or disallow creation of new user accounts.
    */
   
    $moss->config['create_new_users'] = true; 
