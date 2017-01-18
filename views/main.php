<main>
<?php require 'leftMenu.php';?>
    <div class="article">
        <?php
        while ($list_my_articles = mysqli_fetch_assoc($main_content)){

        ?>
        <div class="time"> </div>
        <h2 class="block_title"><?php print($list_my_articles['title']);?></h2>
        <p class="text"><?php print($list_my_articles['content']);?></p>
        <?php
        }
        ?>
    </div>
</main>