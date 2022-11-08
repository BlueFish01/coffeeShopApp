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
            <title>welcome</title>

            <!-- Swiper CSS-->
            <link rel="stylesheet" href="CSS/swiper-bundle.min.css">

            <!-- CSS and Icon-->
            <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.rtl.min.css">
            <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
            <link rel="stylesheet" href="CSS/home.css">
        </head>
        <header>

            <!-- nevber -->
            <nav class="nev_bar">
                <h1>Good Morning</h1>            
                <i class="bi bi-list"></i>
            </nav>

        </header>
        <body class="home-bg">
             
            <div class="main-content">
                <h2>PROMOTION</h2>
                
                <!-- Promotion Card--> 
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="image/promotion1.png" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="image/promotion1.png" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="image/promotion1.png" alt="">
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>

                <!-- Product list -->
                <h2>COFFEE</h2>
                    <div class="product_list">
                    <!--list manu in Espresso category--->
                        <?php 
                            $menu = $db->getMenu('Espresso');
                        ?>
                    </div>
                <h2>TEA</h2>
                    <div class="product_list">
                    <!--list manu in Tea category--->
                        <?php 
                            $menu = $db->getMenu('Tea');
                        ?>
                    </div>    
                    
                    
                    
                



                <h1 class="mt-5">Welcome,<?php echo $_SESSION['USER_NAME'];?></h1>
                
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing </p>
                <hr>
                <a href="/logout" class="btn btn-danger">Logout</a>

            </div>
            <!--swiper script-->
            <script src="js/swiper-bundle.min.js"></script>
            <script>
                var swiper = new Swiper(".mySwiper", {
                    spaceBetween: 10,
                    loop: true,
                    fade:"true",
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                        dynamicBullets: "true",
                    },
                });
            </script>

        </body>
        </html>

<?php

    }

?>