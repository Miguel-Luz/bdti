<?php require_once(TEMPLATE.'/common/top.tpl.php'); ?>
<?php include_once(LIBRARY.'/Helper.php'); ?>


<div class="container" style="margin-top:5rem">

<?php

if(FlashData::hasFlashData()){
    FlashData::getFlashData();
}
?>
<div class="btn-bar d-flex flex-row-reverse"> 
  <a href="/users/add" class="btn btn-success"> <i class="fa fa-user-plus"></i> Inserir </a>   
  <button class="btn btn-danger" type="submit" action="users/delete" form="delete_form"> <i class="fa fa-trash"></i> Excluir  </button>
</div>
<table class="table" >
<thead>
<th> # </th>
  <th>Nome </th>
  <th>Email </th>
  <th>Cor </th>
  <th>Editar</th>
  <th> Excluir</th>
</thead>


<form action="users/delete"  method="post" id="delete_form">
<?php foreach($data['users'] as $user): ?>

<tr>
  <td> <input type="checkbox" name="key_user[]" class="form-check-input" value="<?php echo $user->user_id ?>"> </td>
  <td> <?php echo $user->name ?> </td>
  <td> <?php echo $user->email ?> </td>
  <td> <span class="dot" style="background-color: <?php echo $user->color ?>"></span> </td>
  <td> <a href="/users/edit/<?php echo $user->user_id ?>" class="btn-info" style="padding:0.2em"> Editar <i class="fa fa-pencil"></i> </a> </td>
  <td> <a href="/users/delete/<?php echo $user->user_id ?>" class="btn-danger" style="padding:0.2em">  Excluir <i class="fa fa-trash"></i>  </a> </td>
</tr>

<?php endforeach; ?>
</form>
</table> 

<?php 

  if(count($data['users']) < 1 ){
       echo "<h4> Não há registros</h4>";
  }

?>



</div>
<?php require_once(TEMPLATE.'/common/bottom.tpl.php'); ?>