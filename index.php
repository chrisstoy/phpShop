<?php
    // set up autoloader to look in the server folder for classes
    spl_autoload_register(function ($class_name) {
        $p = 'server/'. $class_name . '.php';
        include $p;
    });

    define('PATH', parse_url(getenv('REQUEST_URI'), PHP_URL_PATH));

    function loadBody($url) {
        $bodyTxt;
        ob_start();
        require($url);
        $bodyTxt = ob_get_contents();
        ob_end_clean();
        return $bodyTxt;
    }

    switch (PATH) {
        case '/main' :
        case '/category' :
        case '/cart' :
        case '/pdp' :
            $body = loadBody('client'.PATH.'.php');
            break;

        default:
            // This should redirect to the main page...not load the main php
            $body = loadBody('client/main.php');
            break;
    }

    // load the master page container
    require('client/master.php');
