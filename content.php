<?php
    include('connection.php');
    $data = file_get_contents('results.json');
    $data = json_decode($data);

    ?>

    <?php
    foreach($data->users as $d=> $obj){
?>
    <li class="collection-item avatar">
      <img src="1.png" alt="" class="circle">
      <span class="title"><?php echo $obj->nama?></span>
      <p><?php echo $obj->comment;?></p>
      <br>
      <a href="update.php?id=<?php echo $obj->id_comment?>" nama="<?php echo $obj->nama?>" comment="<?php echo $obj->comment;?>" class="waves-effect waves-light btn blue btn_upd"><i class="material-icons">edit</i></a>
      <a href="delete.php?id=<?php echo $obj->id_comment?>" class="waves-effect waves-light btn red btn_del"><i class="material-icons">delete</i></a>
    </li>
        
<?php
    }    
?>

<script>

</script>
