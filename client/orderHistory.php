<?php

    session_start();
    include_once('dbconnect.php');
    $db = new db();

    

    
    if($_SESSION['USER_ID']==""){
        header("Location: /");
    }else{
            
?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Orders</title>

            <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.rtl.min.css">
            <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
            <link rel="stylesheet" href="CSS/cart.css">
        </head>
        <header>

            <!-- nevber -->
            <nav class="nev_bar">
                <a href="/home" style="margin: 5px 10px;"><i class="bi bi-x-lg"></i></a>
                <h1>Orders</h1>
            </nav>

        </header>
        <body class="home-bg">
            <div class="orderlist" style="margin-top: 10px;">
                <!-- <div class="order_card">
                    <span class="vertical-line"></span>
                    <h2>order id : 9<br><br>date</h2>
                    <h1 style="width: 50%; text-align:end; padding-right:15px">฿ 245</h1>
                </div> -->
                <?php
                    $order = $db->getOrdersHistory($_SESSION['USER_ID']);
                ?>
                
            </div>
        
            
        </body>
        </html>



<?php

    }

?>