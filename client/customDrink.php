<?php

    $id = $_GET["id"];
    $name = $_GET["name"];
    $img_dir = $_GET["img_dir"];
    $price = $_GET["price"];
    $description = $_GET["description"];

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
            <title><?php echo $name;?></title>

            <!--- CSS --->
            <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.rtl.min.css">
            <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
            <link rel="stylesheet" href="CSS/customDrink.css">

            <!--- icon --->
            

        </head>
        <header>

            <!-- nevber -->
            <nav class="nev_bar">
                <a href="/home" style="margin: 5px 10px;"><i class="bi bi-x-lg"></i></a>
                <!-- <h1>COFFEE</h1>-->
            </nav>

        </header>
        <body class="home-bg">
        
            <!--- coffee img--->
            <div class="img-block">
                <?php echo '<img src="image/'.$img_dir.'" alt="">' ?>
            </div>

            <!--- name and price --->
            <div class="name_card">
                <h1><?php echo $name;?></h1>
                <h2>฿ <?php echo $price;?></h>
            </div>

            <!--- coffee description --->
            <div class="description">
                <p><?php echo $description;?></p>  
            </div>

            <!--- option for hot or ice --->
            <h1>AVAILABLE IN</h1>
            
            <div class="option">

                <input type="radio" name="option" id="hot" checked>
                <label for="hot">Hot</label>

                <input type="radio" name="option" id="iced">
                <label for="iced">Iced</label>

            </div>
            <span class="line"></span>

            <!--- option for size --->
            <br>
            <h1>SIZE</h1>
            <div class="option">

                <input type="radio" name="size" id="small" checked>
                <label for="small">Small</label>

                <input type="radio" name="size" id="regular">
                <label for="regular">Regular</label>

                <input type="radio" name="size" id="large">
                <label for="large">Large</label>

            </div>
            <span class="line"></span>

            <!--- option for suger level --->
            <br>
            <h1>SURGAR LEVEL</h1>
            <div class="option">

                <input type="radio" name="suger" id="nosuger" checked>
                <label for="nosuger">No Suger</label>

                <input type="radio" name="suger" id="1xsuger">
                <label for="1xsuger">1xSuger</label>

                <input type="radio" name="suger" id="2xsuger">
                <label for="2xsuger">2xSuger</label>

            </div>
            <span class="line"></span>
            <br>

            <!--- note --->
            <h1>NOTE</h1>
            <div class="text_area">
                <textarea placeholder="Add a short note, We'll do our best to accommodate."></textarea>
            </div>

            <div class="empty_area"></div>

            <!--- add to cart button --->
            <div class="submit_order">

                <div class="stepperInput">
                    <button class="button button--addOnLeft">-</button>
                    <input type="number" value="1" class="input stepperInput__input"/>
                    <button class="button button--addOnRight" >+</button>
                </div>
                <div class=submit_button>
                    <input class="btn btn-primary" name="Add to cart" type="submit" value="Add to cart">
                    <span>฿ 150</span>
                </div>
            </div>

            <script src="node_modules/jquery/dist/jquery.min.js"></script>
            <script>
                var $stepperInput = $('.stepperInput input');

                function incrementStepperInput(amount) {
                    $stepperInput.val((parseInt($stepperInput.val()) || 0) + amount);
                }

                var stepperInputDecrement = $('.stepperInput button')[0];
                $(stepperInputDecrement).click(() => {
                    if(parseInt($stepperInput.val())!=0){
                        incrementStepperInput(-1);
                    }
                    
                });

                var stepperInputIncrement = $('.stepperInput button')[1];
                $(stepperInputIncrement).click(() => {
                    incrementStepperInput(1);
                });
            </script>
        </body>
        </html>








<?php

    }

?>