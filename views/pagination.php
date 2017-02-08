<div>
    <p><a href="<?php echo $slug;?>&start=<?php echo 0;?>"><<</a></p>
</div>
<?php
for ($i = 0; $i < $pagination[0]; $i++){
    ?>
    <div>
        <p><a href="<?php echo $slug;?>&start=<?php echo  $i*$limit;?>&last=<?php echo $limit ;?>"><?php echo $i+1;?></a></p>
    </div>
    <?php
    $count_i = $i*$limit;
}
?>
<div>
    <p><a href="<?php echo $slug;?>&start=<?php echo  $count_i;?>&last=<?php echo  $limit;?>">>>></a></p>
</div>
<?php
while($all_pagination = mysqli_fetch_assoc($pagination[1])){
  ?>
<div class="time"> <?php print date('Y-m-d',strtotime($all_pagination['time']));?></div>
<h2  class="block_title"><a href="<?php print ($all_pagination['content_full_slug']);?>" ><?php print($all_pagination['title']);?></a></h2>
<p class="text"><?php print($all_pagination['content']);?></p>
<?php
}
?>