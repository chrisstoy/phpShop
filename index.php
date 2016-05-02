<?php
    // define some constants
    define('EXT', '.php');
    define('DS', '/');
    define('SYSTEM_PATH', realpath(__DIR__). DS);

    setlocale(LC_MONETARY, 'en_US');

	// Autoload taken care of by Composer.  See https://getcomposer.org/doc/01-basic-usage.md#autoloading
	require( SYSTEM_PATH. 'vendor/autoload'.EXT);

    // Handle app setup
    $GLOBALS['cartDataSource'] = new \Server\CartDataFileSystem(SYSTEM_PATH.'.cache');

    $mongoDB_Heroku = 'mongodb://heroku_n19cp930:pv8ta3cttcq31fodij23iuoh6q@ds021691.mlab.com:21691/heroku_n19cp930';
    $mongoDB_local = 'mongodb://localhost:27017/scotchbox';

    $GLOBALS['productsDataSource'] = new \Server\ProductsDataFileSystem(SYSTEM_PATH.'server');

	///////////////////////////////////////////
	// Handle Routing

	// SUPER simple routing code
	$urlPath = parse_url(getenv('REQUEST_URI'), PHP_URL_PATH);
	$urlPart = explode('/', trim($urlPath, "/"));
	parse_str((parse_url(getenv('REQUEST_URI'), PHP_URL_QUERY)), $queryParams);
	$queryParams = isset($queryParams) ? $queryParams : [];

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
	
	// merge any POST data with the query params
	$formData = isset($_POST) ? $_POST : [];
	$data = array_merge($queryParams, $formData);

    print call_user_func(array($controller, $action), (object)$data);

