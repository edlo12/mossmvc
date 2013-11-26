<?php
    /**
    * Helpers for theming, available for all themes in their template files and functions.php.
    * This file is included right before the themes own functions.php
    */

    /**
    * Create a url by prepending the base_url.
    */
    function base_url($url) {
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
    /**
    * Print debuginformation from the framework.
    */
    function get_debug() {
      $moss = CMossmvc::Instance(); 
      $html = null;
      if(isset($moss->config['debug']['db-num-queries']) && $moss->config['debug']['db-num-queries'] && isset($mosss->db)) {
        $html .= "<p>Database made " . $moss->db->GetNumQueries() . " queries.</p>";
      }   
      if(isset($moss->config['debug']['db-queries']) && $moss->config['debug']['db-queries'] && isset($moss->db)) {
        $html .= "<p>Database made the following queries.</p><pre>" . implode('<br/><br/>', $moss->db->GetQueries()) . "</pre>";
      }   
      if(isset($moss->config['debug']['mossmvc']) && $ly->config['debug']['mossmvc']) {
        $html .= "<hr><h3>Debuginformation</h3><p>The content of CMossmvc:</p><pre>" . htmlent(print_r($moss, true)) . "</pre>";
      }   
      return $html;
    }
    
//  function get_debug() {
//  $moss = CMossmvc::Instance();
//  $html = null;
//  if(isset($moss->config['debug']['display-mossmvc'])){
//    $html = "<hr><h3>Debuginformation</h3><p>The content of CMossmvc:</p><pre>" . htmlent(print_r($moss, true)) . "</pre>";
//  }
//  $html = "<h2>Debuginformation</h2><hr><p>The content of the config array:</p><pre>" . htmlentities(print_r($moss->config, true)) . "</pre>";
//  $html .= "<hr><p>The content of the data array:</p><pre>" . htmlentities(print_r($moss->data, true)) . "</pre>";
//  $html .= "<hr><p>The content of the request array:</p><pre>" . htmlentities(print_r($moss->request, true)) . "</pre>";
//  return $html;
//}

/**
 * Prepend the theme_url, which is the url to the current theme directory.
 */
function theme_url($url) {
  $moss = CMossmvc::Instance();
  return "{$moss->request->base_url}themes/{$moss->config['theme']['name']}/{$url}";
}