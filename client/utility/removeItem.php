<?php
    session_start();

    $index = $_GET['index'];
    $price = $_SESSION['cart'][$index]['price'];
    
    $price_edited = substr($price,3);        
    $priceInInt = (int)$price_edited;
    $_SESSION['PriceTotal'] -= $priceInInt;

    unset($_SESSION['cart'][$index]);
    $_SESSION['cart'] = array_values($_SESSION['cart']);

    if($_SESSION['PriceTotal']==0){
        header("Location: /home");
    }else{
        header("Location: /cart");
    }
    
?>