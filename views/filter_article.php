<main>
<?php require 'leftMenu.php';?>
<div class="head_filter">
    <p>Показувати</p>
    <div class="select_options">
        <form action="">
            <select class="select_type" name="select_type">
                <?php
                while ($type = mysqli_fetch_assoc($type_article)){
                    ?>
                    <option <?php echo $act->activeItem($slug, $type['parent_categories'], 'selected');?> value="<?php echo $type['parent_categories'];?>">
                        <?php echo $type['name'];?>
                    </option>
                    <?php
                }
                ?>
            </select>

        </form>
    </div>
</div>
<div class="article">
    <?php
    while ($my_content = mysqli_fetch_assoc($main_content)){

        ?>
        <div class="time"> <?php print date('Y-m-d',strtotime($my_content['time']));?></div>
        <h2  class="block_title"><a href="<?php print ($my_content['content_full_slug']);?>" ><?php print($my_content['title']);?></a></h2>
        <p class="text"><?php print($my_content['content']);?></p>
        <?php
    }
    ?>
</div>
</main>

<script>
    $( ".select_type" ).change(function() {
        var url = $(this).val();
        window.location = "http://localhost/new/"+url;
        //console.log( $(this).val()) );
    });
</script>