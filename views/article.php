<main>
    <?php require 'leftMenu.php';?>
    <div>
        <p>
            <?php
            $result_counter = mysqli_fetch_assoc($countViewsArticle);
            if (!empty($result_counter['counter'])){
                echo "Кількість переглядів ".$result_counter['counter'];
            }else{
                echo '';
            }

            echo "<br>";
            ?></p>
        <p>Останній візит <?php echo $lastVisit;?></p>
    </div>
    <div class="article">
        <div>
            <h2><?php print $main_content['title'];?></h2>
            <p><?php print $main_content['content_full'];?></p>
            <img src="img/<?php print $main_content['img'];?>" alt="">
        </div>
        <div class="my_coments">
            <?php
                while ($arr_show_coments = mysqli_fetch_assoc($show_coments)){
                    ?>
            <p class="comment_name"><?php echo $arr_show_coments['name'];?></p>
            <p class="comment_text"><?php echo $arr_show_coments['text'];?></p>
                    <p class="comment_date"><?php echo $arr_show_coments['date_add'];?></p>
            <?php
                }
            ?>
        </div>
    </div>
    <?php include 'coment.php';?>

</main>