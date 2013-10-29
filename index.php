<?php
    //
    // PHASE: BOOTSTRAP
    //
    define('MOSSMVC_INSTALL_PATH', dirname(__FILE__));
    define('MOSSMVC_SITE_PATH', MOSSMVC_INSTALL_PATH . '/site');

    require(MOSSMVC_INSTALL_PATH.'/src/CMossmvc/bootstrap.php');

    $moss = CMossmvc::Instance();
    
    //
    // PHASE: FRONTCONTROLLER ROUTE
    //
    $moss->FrontControllerRoute();
    
    //
    // PHASE: THEME ENGINE RENDER
    //
    $moss->ThemeEngineRender();