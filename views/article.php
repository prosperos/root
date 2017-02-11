<main>
    <?php require 'leftMenu.php';?>
    <div>
        <p>Кількість переглядів
            <?php
            $result_counter = mysqli_fetch_assoc($countViewsArticle);
            echo $result_counter['counter'];
            echo "<br>";
            $ip = $_SERVER["REMOTE_ADDR"];
            $v = 10;
            $w = 4;
            echo (int)$v / (int)$w;

            ?></p>
        <p>Останній візит <?php echo $lastVisit;?></p>
    </div>
    <div class="article">
        <div>
            <h2><?php print $main_content['title'];?></h2>
            <p><?php print $main_content['content_full'];?></p>
            <img src="img/<?php print $main_content['img'];?>" alt="">
        </div>
    </div>
</main>