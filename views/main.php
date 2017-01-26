<main>
<?php require 'leftMenu.php';?>
    <div class="head_filter">
        <p>Показувати</p>
        <div class="select_options">
            <form action="">
                <select name="type_article" id="">
                    <?php
                    while ($type = mysqli_fetch_assoc($type_article)){


                        ?>
                    <option value="<?php echo $type['id'];?>"><?php echo $type['name'];?>
                       <?php
                       }
                        ?>
                    </option>
                </select>
            </form>
        </div>
    </div>
    <div class="article">
        <?php
        while ($list_my_articles = mysqli_fetch_assoc($main_content)){

        ?>
        <div class="time"> <?php print date('Y-m-d',strtotime($list_my_articles['time']));?></div>
        <h2  class="block_title"><a href="?<?php print ($list_my_articles['content_full_slug']);?>" ><?php print($list_my_articles['title']);?></a></h2>
        <p class="text"><?php print($list_my_articles['content']);?></p>
        <?php
        }
        ?>
    </div>
</main>