<?php
    // define some constants
    define('EXT', '.php');
    define('DS', '/');
    define('SYSTEM_PATH', realpath(__DIR__). DS);

	// Autoload taken care of by Composer.  See https://getcomposer.org/doc/01-basic-usage.md#autoloading
	require( SYSTEM_PATH. '/vendor/autoload'.EXT);

	///////////////////////////////////////////
	// Handle Routing

	// SUPER simple routing code
	$urlPath = parse_url(getenv('REQUEST_URI'), PHP_URL_PATH);
	$urlPart = explode('/', trim($urlPath, "/"));
	parse_str((parse_url(getenv('REQUEST_URI'), PHP_URL_QUERY)), $queryParams);

	// render the requested page
	$ctrlName = "\Controllers\\".$urlPart[0];
	$action = isset($urlPart[1]) ? $urlPart[1] : 'index';

	if ( class_exists($ctrlName) ){
        $controller = new $ctrlName();
    }
    else {
        $controller = new \Controllers\error();
        $action = 'handle_404';
        $queryParams = [
            'page' => $urlPart[0]
        ];
    }
    print call_user_func_array(array($controller, $action), $queryParams);

