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
            <!--- icon --->
            <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.rtl.min.css">
            <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
            <link rel="stylesheet" href="CSS/customDrink.css">
            

        </head>
        <header>

            <!-- nevber -->
            <nav class="nev_bar">
                <a href="/home" style="margin: 5px 10px;"><i class="bi bi-x-lg"></i></a>
                <h1>CUSTOM</h1>
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
                <h2 id='base_price'>฿ <?php echo $price;?></h2>
            </div>

            <!--- coffee description --->
            <div class="description">
                <p><?php echo $description;?></p>  
            </div>

            <!--- option for hot or ice --->
            <h1>AVAILABLE IN</h1>

            <!--- form start here --->
            <form action="utility/AddToCart.php" method="POST">

                <input type="hidden" name="product_id" value="<?php echo $id ?>">
                <input type="hidden" name="img_dir" value="<?php echo $img_dir ?>">
                <input type="hidden" name="product_name" value="<?php echo $name ?>">

                <div class="option">

                    <input type="radio" name="option" id="hot" value="Hot" checked>
                    <label for="hot">Hot</label>

                    <input type="radio" name="option" id="iced" value="Iced">
                    <label for="iced">Iced</label>

                </div>
                <span class="line"></span>

                <!--- option for size --->
                <br>
                <h1>SIZE</h1>
                <div class="option">

                    <input type="radio" name="size" id="small" value="small" checked>
                    <label for="small">Small</label>

                    <input type="radio" name="size" id="regular" value="regular">
                    <label for="regular">Regular</label>

                    <input type="radio" name="size" id="large" value="large">
                    <label for="large">Large</label>

                </div>
                <span class="line"></span>

                <!--- option for suger level --->
                <br>
                <h1>SURGAR LEVEL</h1>
                <div class="option">

                    <input type="radio" name="suger" id="nosuger" value="noSugar" checked>
                    <label for="nosuger">No Sugar</label>

                    <input type="radio" name="suger" id="1xsuger" value="1xSugar">
                    <label for="1xsuger">1xSugar</label>

                    <input type="radio" name="suger" id="2xsuger" value="2xSugar">
                    <label for="2xsuger">2xSugar</label>

                </div>
                <span class="line"></span>
                <br>

                <!--- note --->
                <h1>NOTE</h1>
                <div class="text_area">
                    <textarea name="comment" placeholder="Add a short note, We'll do our best to accommodate."></textarea>
                </div>
            


                <div class="empty_area"></div>

                <!--- add to cart button --->
                <div class="submit_order">

                    <div class="stepperInput">
                        <button type="button" class="button button--addOnLeft">-</button>
                        <input type="number" name="qty" value="1" class="input stepperInput__input"/>
                        <button type="button" class="button button--addOnRight" >+</button>
                    </div>
                    
                    <div class=submit_button>
                        <span>Add to cart</span>
                        <!-- <input class="btn btn-primary left" name="AddToCart" type="submit" value="Add to cart"/> -->
                        <input class="btn btn-primary right" id="sum_price" name="sum_price" type="submit"/>
                    </div>
                </div>
            </form>

            <script src="node_modules/jquery/dist/jquery.min.js"></script>
            <script>
                var $stepperInput = $('.stepperInput input');
                var basePrice = document.getElementById('base_price').innerHTML;
                var basePrice = basePrice.slice(2);
                var extraPrice = 0;
                
                function incrementStepperInput(amount) {
                    $stepperInput.val((parseInt($stepperInput.val()) || 0) + amount);
                }
                //updatePrice and display
                function updatePrice(){
                    var result = (parseInt(basePrice) + extraPrice) * parseInt($stepperInput.val());
                    document.getElementById("sum_price").value = "฿ "+result;    
                }

                updatePrice();
                //event Listener for radio button
                document.addEventListener('input',(e)=>{

                    if(e.target.getAttribute('name')=="size"){
                        console.log(e.target.value);
                        switch(e.target.value){
                            case "small":
                                extraPrice = 0;
                                break;
                            case "regular":
                                extraPrice = 15;
                                break;
                            case "large":
                                extraPrice = 30;
                                break;
                            default:
                                break;
                        }
                        updatePrice();
                    }

                })

                var stepperInputDecrement = $('.stepperInput button')[0];
                $(stepperInputDecrement).click(() => {
                    if(parseInt($stepperInput.val())!=0){
                        incrementStepperInput(-1);
                        updatePrice();
                        
                    }
                    
                });

                var stepperInputIncrement = $('.stepperInput button')[1];
                $(stepperInputIncrement).click(() => {
                    incrementStepperInput(1);
                    updatePrice();
                    
                });

                


            </script>
        </body>
        </html>








<?php

    }

?>