<div id="left_menu">
    <ul class="left_menu_item">
        <?php
        while ($menu_left_item = mysqli_fetch_assoc($my_left_menu)){


            ?>
            <li >
                <a href="<?php echo $menu_left_item['slug']?>">
                     <span>
                        <img src="img/<?php echo $menu_left_item['img']?>" alt="">
                     </span><?php echo $menu_left_item['name'];?>
                </a>
            </li>
            <?php
        }
        ?>
    </ul>
</div>