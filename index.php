<?php
    //
    // PHASE: BOOTSTRAP
    //
    define('MOSMVC_INSTALL_PATH', dirname(__FILE__));
    define('MOSMVC_SITE_PATH', MOSMVC_INSTALL_PATH . '/site');

    require(MOSMVC_INSTALL_PATH.'/src/CMossmvc/bootstrap.php');

    $moss = CMossmvc::Instance();
    
    //
    // PHASE: FRONTCONTROLLER ROUTE
    //
    $moss->FrontControllerRoute();
    
    //
    // PHASE: THEME ENGINE RENDER
    //
    $moss->ThemeEngineRender();