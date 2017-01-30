<main>
    <?php require 'leftMenu.php';?>
        <div>
            <?php
            while($search_full = mysqli_fetch_assoc($main_content)){

                ?>
                <h2><a href="<?php echo $search_full['content_full_slug'];?>"><?php echo $search_full['title'];?> </a></h2>
                <p style="height: 50px; overflow: hidden;"><?php echo $search_full['content_full'];?></p>
                <?php
            }
            ?>

        </div>
</main>