<main>
<?php require 'leftMenu.php';?>
    <div class="head_filter">
        <p>Показувати</p>
        <div class="select_options">
            <form action="">
               <select class="select_type" name="select_type">
                    <?php
                    while ($type = mysqli_fetch_assoc($type_article)){

                        $type_id = $type['id'];

                        ?>
                    <option value="<?php echo $type['parent_categories'];?>">
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
        while ($list_my_articles = mysqli_fetch_assoc($main_content)){

        ?>
        <div class="time"> <?php print date('Y-m-d',strtotime($list_my_articles['time']));?></div>
        <h2  class="block_title"><a href="<?php print ($list_my_articles['content_full_slug']);?>" ><?php print($list_my_articles['title']);?></a></h2>
        <p class="text"><?php print($list_my_articles['content']);?></p>
        <?php
        }
        ?>
    </div>
    <div class="paginate">
        <?php
        include 'pagination.php';
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