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
            <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
            <link rel="stylesheet" href="CSS/home.css">
        </head>
        <header>
            <nav class="nev_bar">
                <h1>Good Morning</h1>
                <i class="bi bi-list"></i>
                <i class="bi bi-bag"></i>
            </nav>
        </header>
        <body class="home-bg">
            
            <div class="main-content">

                <h1 class="mt-5">Welcome,<?php echo $_SESSION['USER_NAME'];?></h1>
                
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusamus magnam vel dolorem dolorum eaque, consequatur incidunt praesentium totam quasi nisi, dolores amet autem. Sapiente at iusto quidem laborum. Magnam fugit dicta, ab animi aut nisi, est atque quisquam fugiat cupiditate dolorem nobis? Itaque earum deserunt quibusdam nemo, facilis qui omnis culpa beatae labore eligendi at provident praesentium quidem quisquam reprehenderit, quas nobis recusandae iste. Provident facere cum unde perspiciatis vero sint molestias quam delectus iusto voluptatibus alias commodi eos dolorum inventore, itaque eligendi quod hic, ex animi error velit quos! Excepturi labore aperiam molestias magni vero modi dignissimos, aut eligendi in nam nostrum unde sit magnam dolorem ullam sunt officiis totam hic incidunt culpa? Quasi asperiores alias, maxime, quam accusamus cum blanditiis officiis, tenetur quia nemo dolores dicta voluptas eius sunt amet ratione eos enim eum? Rem a officiis laborum ipsam numquam praesentium assumenda esse perferendis animi iste delectus nulla quos debitis, consequuntur dolore architecto harum accusamus, omnis ipsum odio perspiciatis qui quasi. Sequi laborum mollitia corrupti incidunt? Quas exercitationem maxime et delectus fugiat. Cumque sit natus quas maxime, dolorem, numquam illum eum quis laboriosam dolorum est nisi consequatur? Mollitia asperiores eveniet, officiis non perspiciatis deleniti laborum et alias minima, corporis voluptatum ad optio laboriosam commodi ex a quam sequi! Delectus vitae, cum maxime non ab molestias voluptatem facere quasi reiciendis quibusdam velit beatae, a maiores recusandae autem nesciunt dignissimos fugit distinctio explicabo ratione impedit! Rem aperiam cum maxime, reprehenderit eligendi sint. Quaerat non praesentium, odit minus maiores nobis cumque accusamus ut animi sit fuga hic dicta dignissimos sapiente amet quisquam et quam! Aut, ipsa fugit obcaecati ea modi delectus sunt sequi consectetur ab nihil molestias quibusdam optio. Et assumenda, cum asperiores illo blanditiis impedit necessitatibus soluta ipsa quae. Dicta quo officia sequi, ducimus odio nihil, quos dolores soluta eius possimus asperiores, quaerat veniam nesciunt molestias architecto nostrum. Nemo at unde pariatur tenetur sequi error quas sapiente, facilis voluptatum, quae quasi officiis, distinctio veniam? Adipisci fugiat ipsam hic possimus voluptate aliquid doloremque velit officiis nesciunt suscipit dolorum reiciendis odit voluptas saepe quasi ab itaque, commodi soluta pariatur distinctio laudantium blanditiis eum quidem deserunt! Possimus optio quaerat quod excepturi in, et architecto soluta! Corrupti aut illo porro sunt dolorum quo odio quasi nostrum quas possimus, minus dignissimos. Itaque illo labore veniam velit architecto consequuntur soluta alias ut repellendus molestiae. Labore, repellat. Nobis illum expedita debitis voluptatem quisquam, cupiditate nihil autem molestias perspiciatis, incidunt animi fuga distinctio odio dolore porro est. Nulla corporis voluptates impedit architecto minus porro! Atque quas sed modi blanditiis ipsam illum eaque omnis saepe voluptate hic laboriosam repellendus dolor molestias autem, dignissimos quaerat soluta labore ex ullam! Doloremque natus quasi explicabo iste est! Vero quo sint at quidem earum necessitatibus laudantium est, culpa sed consequuntur laboriosam provident, assumenda reiciendis rerum, hic eos aperiam dicta optio. Suscipit atque quod minus ea esse beatae quisquam qui ipsum. Impedit debitis temporibus tempore minima minus, repellat maiores eos aperiam omnis, ex ab doloribus! Quasi quia aspernatur nobis voluptate obcaecati. Sapiente, iste voluptas.</p>
                <hr>
                <a href="/logout" class="btn btn-danger">Logout</a>

            </div>
            
        </body>
        </html>

<?php

    }

?>