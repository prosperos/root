<html>
<head>
    <title>videouroki.net</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
</head>
<body>

<!--<script src="https://use.fontawesome.com/06a25b54c3.js"></script>-->
<!--<i class="fa fa-ravelry" aria-hidden="true"></i>-->

<header>
        <div id="top">

            <ul class="top_menu">
                <?php
                while ($manu_item = mysqli_fetch_assoc($my_menu)){

                    $active = $act->activeItem($slug, $manu_item['slug_struct']);// запуск класа для активоного меню

                    ?>
                    <li class="<?php echo $active;?>">
                        <a href="<?php echo $manu_item['slug_struct'];?>"><?php echo $manu_item['title'];?></a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <div class="container">
            <div class="logo">
                <a href=""><img src="img/logo.png" alt=""></a>
            </div>
            <div class="search">
                <form action="search" method="post">
                    <input type="text" name="words" id="find" placeholder="Введіть текст для пошуку">
                    <input type="submit" name="bsearch" value="find">
                </form>
            </div>
            <div class="right_profile">

            </div>
        </div>

</header>
