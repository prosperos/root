<html>
<head>
    <title>videouroki.net</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <div id="top">
        <ul class="top_menu">
            <?php
            while ($manu_item = mysqli_fetch_assoc($my_menu)){


                ?>
                <li class="active">
                    <a href="?<?php echo $manu_item['chpy_struct'];?>"><?php echo $manu_item['title'];?></a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
    <div class="container">
        <div class="logo">
            <a href="?id=blog"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="search">
            <form action="/search">
                <input type="text" name="search" id="find" placeholder="Введіть текст для пошуку">
                <button>send</button>
            </form>
        </div>
        <div class="right_profile">

        </div>
    </div>
</header>
