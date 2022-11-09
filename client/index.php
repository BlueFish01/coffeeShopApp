<?php
    

    $request = $_SERVER['REQUEST_URI'];

    $url = explode("?", $request);
    
    switch ($url[0]) {

        case '':
        case '/':
            require __DIR__ . '/login.php';
            break;

        case '/home':
            require __DIR__ . '/home.php';
            break;

        case '/register':
            require __DIR__ . '/register.php';
            break;

        case '/customDrink':
            require __DIR__ . '/customDrink.php';
            break;

        case '/logout':
            require __DIR__ . '/utility/logout.php';
            break;

        default:
            http_response_code(404);
            require __DIR__ . '/404.php';
            break;
    }
    
?>