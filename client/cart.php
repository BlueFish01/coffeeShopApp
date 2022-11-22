<?php 
    
    session_start();

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
                <title>Cart</title>

                <!--- CSS --->
                <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.rtl.min.css">
                <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
                <link rel="stylesheet" href="CSS/cart.css">
                          
            
            </head>
            <header>

            <!-- nevber -->
            <nav class="nev_bar">
                <a href="/home" style="margin: 5px 10px;"><i class="bi bi-x-lg"></i></a>
                <h1>CART</h1>
            </nav>

            </header>

            <body class="home-bg">

                
                <div class="name_card">
                    <h1>Order Summary</h1>    
                </div>
                
                <!--- order list --->
                <div class="orderlist">
                    
                    <?php
                        $index = 0;
                        foreach ($_SESSION['cart'] as $value) {
                            echo    '<div class="order_card">

                                        <img src="image/'.$value['img'].'" alt="">
                                        <h2> 
                                            '.$value['name'].'<br>
                                            <span>'.$value['option'].' . '.$value['size'].' . '.$value['suger'].'</span>
                                            <br>
                                            <span>'.$value['price'].'</span>
                                        </h2>
                                        <h1>'.$value['qty'].'</h1>
                                        <a href="utility/removeItem.php?index='.$index.'"><i class="bi bi-trash"></i></a>
                            
                                    </div>';
                            $index += 1;
                        }
                        
                    ?>
                    
                            <span class="line"></span>
                            <div class="total">
                            
                                <h1>Total Amount</h1>
                                <h2>฿ <?php echo $_SESSION['PriceTotal']?></h2>
                            </div>
                            <span class="line"></span>

                    
                    <div class="empty_area"></div>
                    

                    
                        <div class="submit_order"> 
                            <div class=submit_button>
                                <span>Order Now</span>
                                <!-- <input class="btn btn-primary left" name="AddToCart" type="submit" value="Add to cart"/> -->
                                <a href="/payment"><button class="btn btn-primary right">฿ <?php echo $_SESSION['PriceTotal']?></button></a>
                            </div>
                        </div>

                    
        

            
                </div>
                
                

            </body>
            </html>



<?php

    }

?>