<?php

    session_start();
    
    if(isset($_POST['sum_price'])&&$_POST['qty']>0){

            $id = $_POST['product_id'];
            $option = $_POST['option']; 
            $size = $_POST['size']; 
            $suger = $_POST['suger'];
            $qty = $_POST['qty'];  
            $comment = $_POST['comment'];
            $img = $_POST['img_dir'];
            $name = $_POST['product_name'];
            $price = $_POST['sum_price'];

           
            $price_edited = substr($price,3);
            
            $priceInInt = (int)$price_edited;
            
            $_SESSION['PriceTotal'] += $priceInInt;
            

            
            // if cart already exist insert item to cart
            if(isset($_SESSION['cart']) && is_array($_SESSION['cart'])){

                array_push($_SESSION['cart'],['product_id'=>$id,'option'=>$option,'size'=>$size,'suger'=>$suger,'qty'=>$qty,'comment'=>$comment,'img'=>$img,'name'=>$name,'price'=>$price]);
                
                header("Location: /home");

            }
            //if cart is not exist create a new one and insert item to cart
            else{
                $_SESSION['cart'] = array(['product_id'=>$id,'option'=>$option,'size'=>$size,'suger'=>$suger,'qty'=>$qty,'comment'=>$comment,'img'=>$img,'name'=>$name,'price'=>$price]);
                
                header("Location: /home");
            }
            
            

    }else{
        header("Location: /home");
    }


?>