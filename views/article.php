<main>
    <?php require 'leftMenu.php';?>
    <div class="article">
        <div>
            <h2><?php print $main_content['title'];?></h2>
            <p><?php print $main_content['content_full'];?></p>
            <img src="img/<?php print $main_content['img'];?>" alt="">
        </div>
    </div>
</main>