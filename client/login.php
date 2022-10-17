<?php
    session_start();
    include_once('dbconnect.php');
    $db = new db();

    if(isset($_POST['login'])){
        $uname = $_POST['username'];
        $passwd = md5($_POST['password']);;

        $result = $db->login($uname,$passwd);
        $row = mysqli_fetch_array($result);

        if($row > 0){
            $_SESSION['USER_ID'] = $row['USER_ID'];
            $_SESSION['USER_NAME'] = $row['USER_NAME'];
            $_SESSION['USER_FNAME'] = $row['USER_FNAME'];
            $_SESSION['USER_EMAIL'] = $row['USER_EMAIL'];
            echo "<script>window.location.href='/home'</script>";
        }else{
            echo "<script>alert('your username or password are incorrect.')</script>";
            echo "<script>window.location.href='/'</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="CSS/login.css">
</head>
<body class="login-bg">
    
    <div class="center">
        <h1>Login</h1>
        <form method="POST">
            <div class="text-field" >
                <input type="text" placeholder="Username" name="username" required>
                <i class="bi bi-person"></i>
                <span></span>
            </div>
            <div class="text-field">
                <input type="Password" placeholder="Password" autocomplete="new-password" name="password" required>
                <i class="bi bi-lock"></i>
                <span></span>
            </div>
            <input class="btn btn-primary" name="login" type="submit" value="Login">
            <div class="signup_link">
                No account? <a href="/register">Create one!</a>
            </div>

        </form>

    </div>
</body>
</html>