<?php
    /**
    * Helpers for theming, available for all themes in their template files and functions.php.
    * This file is included right before the themes own functions.php
    */

    /**
    * Create a url by prepending the base_url.
    */
    function base_url($url=null) {
      return CMossmvc::Instance()->request->base_url . trim($url, '/');
    }

    /**
    * Return the current url.
    */
    function current_url() {
      return CMossmvc::Instance()->request->current_url;
    }
    
    /**
    * Print debuginformation from the framework.
    */
    function get_debug() {
      $moss = CMossmvc::Instance();
      if(empty($moss->config['debug'])){
        return;
      }
      // Get the debug output
      $html = null;
      if(isset($moss->config['debug']['db-num-queries']) && $moss->config['debug']['db-num-queries'] && isset($moss->db)) {
        $flash = $moss->session->GetFlash('database_numQueries');
        $flash = $flash ? "$flash + " : null;
        $html .= "<p>Database made $flash" . $moss->db->GetNumQueries() . " queries.</p>";
      }   
      if(isset($moss->config['debug']['db-queries']) && $moss->config['debug']['db-queries'] && isset($moss->db)) {
        $flash = $moss->session->GetFlash('database_queries');
        $queries = $moss->db->GetQueries();
        if($flash){
          $queries = array_merge($flash, $queries);
        }
        $html .= "<p>Database made the following queries.</p><pre>" . implode('<br/><br/>', $queries) . "</pre>";
      }   
      if(isset($moss->config['debug']['timer']) && $moss->config['debug']['timer']) {
        $html .= "<p>Page was loaded in ".round(microtime(true)-$moss->timer['first'], 5)*1000 . " msecs.</p>";
      }
      if(isset($moss->config['debug']['mossmvc']) && $moss->config['debug']['mossmvc']) {
        $html .= "<hr><h3>Debuginformation</h3><p>The content of CMossmvc:</p><pre>" . htmlent(print_r($moss, true)) . "</pre>";
      }
      if(isset($moss->config['debug']['session']) && $moss->config['debug']['session']){
        $html .= "<hr><h3>SESSION</h3><p>The content of CMossmvc->session:</p><pre>".htmlent(print_r($moss->session, true))."</pre>";
        $html .= "<p>The content of \$_SESSION:</p><pre>".htmlent(print_r($_SESSION,true))."</pre>";
      }
      return $html;
    }
    


    /**
     * Prepend the theme_url, which is the url to the current theme directory.
     */
    function theme_url($url) {
      $moss = CMossmvc::Instance();
      return "{$moss->request->base_url}themes/{$moss->config['theme']['name']}/{$url}";
    }
    
   /**
    * Render all views.
    */
    function render_views() {
      return CMossmvc::Instance()->views->Render();
    }
    
        
   /**
    * Get messages stored in flash-session.
    */
    function get_messages_from_session() {
      $messages = CMossmvc::Instance()->session->GetMessages();
      $html = null;
      if(!empty($messages)) {
        foreach($messages as $val) {
          $valid = array('info', 'notice', 'success', 'warning', 'error', 'alert');
          $class = (in_array($val['type'], $valid)) ? $val['type'] : 'info';
          $html .= "<div class='$class'>{$val['message']}</div>\n";
        }
      }
      return $html;
    }
    
/**
 * Create a url to an internal resource.
 */
 function create_url($url=null) {
    return CMossmvc::Instance()->request->CreateUrl($url);
  }

