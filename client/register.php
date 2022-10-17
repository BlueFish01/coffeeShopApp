<?php
   include_once('dbconnect.php');
   $db = new db();

   if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $fname = $_POST['fullname'];
        $uname = $_POST['username'];
        $passwd = md5($_POST['password']);


        $reg = $db->registration($email,$fname,$uname,$passwd);
        if($reg){
            
            echo "<script>alert('your account has been created.')</script>";
            echo "<script>window.location.href='/'</script>";

        }else{
            
            echo "<script>alert('something wrong, pls try again.')</script>";
            echo "<script>window.location.href='/register'</script>";
        }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="CSS/login.css">
</head>
<body class="login-bg">
    
    <div class="center">
        <h1 class="signup" style="border-bottom: none !important;">Sign up</h1>
        <form method="POST">
            <div class="text-field" >
                <input type="email" placeholder="Email" name="email" required>
                <i class="bi bi-envelope"></i>
                <span></span>
            </div>
            <div class="text-field" >
                <input type="text" placeholder="Fullname" name="fullname"required>
                <i class="bi bi-caret-left"></i>
                <span></span>
            </div>
            <div class="text-field" >
                <input type="text" placeholder="Username" name="username" onblur="checkusername(this.value)" required>
                <i class="bi bi-person"></i>
                <span></span>
            </div>
            <div class="text-field">
                <input type="Password" placeholder="Password" autocomplete="new-password" name="password" required>
                <i class="bi bi-lock"></i>
                <span></span>
            </div>
            <span id="username-available"></span>
            <input class="btn btn-primary" id="submit" name="submit" type="submit" disabled value="Register">
            <div class="signup_link">
                Already have an account? <a href="/">Sign in</a>
            </div>

        </form>

    </div>

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script>
        function checkusername(val){
            $.ajax({
                type: 'POST',
                url: 'checkuser_available.php',
                data: 'username='+val,
                success: function(data){
                    $('#username-available').html(data);
                }
            })
        }
    </script>
</body>
</html>