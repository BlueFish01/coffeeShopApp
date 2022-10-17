<?php

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
            <title>welcome</title>
            <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.rtl.min.css">
        </head>
        <body>
            <div class="center">

                <h1 class="mt-5">welcome,<?php echo $_SESSION['USER_NAME'];?></h1>
                <hr>
                <a href="/logout" class="btn btn-danger">Logout</a>

            </div>
            
        </body>
        </html>

<?php

    }

?>