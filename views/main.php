<main>
<?php require 'leftMenu.php';?>
    <div class="article">
        <?php
        while ($list_my_articles = mysqli_fetch_assoc($main_content)){

        ?>
        <div class="time"> </div>
        <h2 class="block_title"><?php var_dump($list_my_articles);?></h2>
        <p class="text"></p>
        <?php
        }
        ?>
    </div>
</main>