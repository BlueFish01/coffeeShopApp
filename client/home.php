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
                <h1>Good Morning<br><span style="font-size: 1.5rem;"><?php echo $_SESSION['USER_NAME'];?></span></h1>            
                
                <i class="bi bi-list" onclick="toggleMenu()"></i>
                
                <div class="sub_menu_warp" id="submenu">
                    <div class="sub_menu">
                        <a href="/orders" class="sub_menu_link">
                            <h1>Orders</h1>
                            <i class="bi bi-clock-history"></i>
                        </a>
                        <hr>
                        <a href="/logout" class="sub_menu_link">
                            <h1>logout</h1>
                            <i class="bi bi-box-arrow-right"></i>
                        </a>

                    </div>
                </div>
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
                
                    
                <hr>
                
                <div class="emptyspace" id="empty_space" style="height:100px;" hidden="false"></div>
                <div class="submit_order" id="cart" hidden="false">               
                    <button onclick="window.location.href='/cart'"  class="btn btn-primary right">VIEW CART</button>
                </div>

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
                
                let submenu = document.getElementById("submenu");

                function toggleMenu(){
                    submenu.classList.toggle("open-menu");
                }


            </script>

        </body>
        </html>

<?php

        if($_SESSION['PriceTotal']==0){
            echo "<script>document.getElementById('cart').hidden = ture</script>";
            echo "<script>document.getElementById('empty_space').hidden = ture</script>";
        }else{
            echo "<script>document.getElementById('cart').hidden = false</script>";
            echo "<script>document.getElementById('empty_space').hidden = false</script>";
        }

    }

?>