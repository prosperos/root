<main>
    <?php require 'leftMenu.php';?>
    <div>
        <p>Кількість переглядів
            <?php
            $result_counter = mysqli_fetch_assoc($countViewsArticle);
            //var_dump($countViewsArticle);
            echo $result_counter['counter'];
            //echo $countViews;
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