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
        <title>Payment</title>

        <!--- CSS --->
        <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.rtl.min.css">
        <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
        <link rel="stylesheet" href="CSS/cart.css">

    </head>
    <header>

            <!-- nevber -->
        <nav class="nev_bar">
            <h1 style="text-align: center;">Payment</h1>
        </nav>

    </header>

    <body class="home-bg" style="overflow-y: hidden;">
        <input type="hidden" id="price" value="<?php echo $_SESSION['PriceTotal']?>">
        <div class="head_qr">
            <img src="image/thaiQR.png" alt="">
        </div>

        <div class="img_qr" id="qrcode">

        </div>

        <div class="name_card" style="padding: 0 10px;">
            <h1 style="text-align:center; width:100%;">Total Amount : <?php echo $_SESSION['PriceTotal']?> THB</h1>    
        </div>
        <form method="POST">
            <div class=submit_button style="padding: 5px 10px;">
                <input type="submit" name="paid" class="btn btn-primary right" style="text-align:center;" value="DONE">
            </div>
        </form>
        
        <div class=submit_button style="padding: 5px 10px;">
            <a href="/cart"><button class="btn btn-primary cancel">CANCEL</button></a>
        </div>

        <script src="js/bundle.js"> </script>

    </body>
        
    </html>




<?php

        if(isset($_POST['paid'])){
            include_once('dbconnect.php');
            $db = new db();
            $order = $db->createOrder($_SESSION['USER_ID'],$_SESSION['PriceTotal']);
            
            foreach ($_SESSION['cart'] as $value) {
                $drinkList = $db->createDrinkList($order,$value['product_id'],$value['option'],$value['size'],$value['suger'],$value['qty'],$value['comment'],$value['price']);
            }
            
        
            $_SESSION['PriceTotal'] = 0;
            unset($_SESSION['cart']);
            echo "<script>alert('Thank you for your order')</script>";
            echo "<script>window.location.href='/home'</script>";

        }else{
            
        }

    }
?>