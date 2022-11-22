<?php
    

    $request = $_SERVER['REQUEST_URI'];

    $url = explode("?", $request);
    session_start();
    
    switch ($url[0]) {

        case '':
        case '/':
            if($_SESSION['USER_ID']!=""){
                header("Location: /home");
            }else{
                require __DIR__ . '/login.php';
            }
            
            break;

        case '/home':
            require __DIR__ . '/home.php';
            break;

        case '/register':
            require __DIR__ . '/register.php';
            break;
        
        case '/cart':
            require __DIR__ . '/cart.php';
            break;

        case '/customDrink':
            require __DIR__ . '/customDrink.php';
            break;

        case '/logout':
            require __DIR__ . '/utility/logout.php';
            break;

        case '/payment':
            require __DIR__ . '/payment.php';
            break;

        case '/orders':
            require __DIR__ . '/orderHistory.php';
            break;

        default:
            http_response_code(404);
            require __DIR__ . '/404.php';
            break;
    }
    
?>