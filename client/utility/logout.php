

<?php


    $ans = $_GET['ans'];
    echo $ans;

    if($ans == 1){

        session_start();
        session_destroy();

        echo "<script>window.location.href='/'</script>";

    }else{
        echo '<script>
            let confirmAction = confirm("Are you sure you want to logout?");
            if (confirmAction) {
            window.location.href="/logout?ans=1"
            } else {
            window.location.href="/home"
            }
        
            </script>';
    }
    
    
    

?>