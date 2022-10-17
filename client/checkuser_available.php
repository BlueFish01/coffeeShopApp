<?php
    
    include_once('dbconnect.php');

    $db = new db();
    
    //get pose value
    $uname = $_POST['username'];
    
    $sql = $db->check_user_avalible($uname);
    
    // $num = mysqli_num_rows($sql);
    $num = mysqli_num_rows($sql);
    
    if($num>0){
       
        echo "<span style='color: red;margin: 20px;'>Username has already existed</span>";
        echo "<script>$('#submit').prop('disabled', true);</script>";
    }else{
        echo "<script>$('#submit').prop('disabled', false);</script>";
    }

?>