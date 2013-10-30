<?php
    /**
    * Helpers for the template file.
    */
    $moss->data['header'] = '<h1>Header: Mossmvc</h1>';
    $moss->data['main']   = '<p>Main: Now with a theme engine, Not much more to report for now.</p>';
    $moss->data['footer'] = '<p>Footer: &copy; Mossmvc by Edith Lopez, based on Lydia by Mikael Roos (mos@dbwebb.se)</p>';


    /**
    * Print debuginformation from the framework.
    */
    function get_debug() {
      $moss = CMossmvc::Instance();
      $html = "<h2>Debuginformation</h2><hr><p>The content of the config array:</p><pre>" . htmlentities(print_r($moss->config, true)) . "</pre>";
      $html .= "<hr><p>The content of the data array:</p><pre>" . htmlentities(print_r($moss->data, true)) . "</pre>";
      $html .= "<hr><p>The content of the request array:</p><pre>" . htmlentities(print_r($moss->request, true)) . "</pre>";
      return $html;
    }