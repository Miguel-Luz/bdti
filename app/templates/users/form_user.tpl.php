<?php require_once(TEMPLATE.'/common/top.tpl.php'); ?>

<div class="container" style="margin-top:2rem">

<h4> Cadastro de Usuário.   </h4>
<form action="<?php echo $actionForm ?>"  method="post">


<div class="row">
  
  <div class="col-md-1">
      <div class="form-group"> 
        <label> Nome:   </label>
      </div> 
  </div>


<div class="col-md-2">
    <div class="form-group">
      <input type="text" name="name" class="form-control" value="<?php echo $dataName ?? '' ?>">
    </div>           
</div>

</div>

<div class="row">
  
  <div class="col-md-1">
      <div class="form-group"> 
        <label> Email:   </label>
      </div> 
  </div>


<div class="col-md-2">
    <div class="form-group">
      <input type="mail" name="email" class="form-control" value="<?php echo $dataEmail ?? '' ?>">
    </div>           
</div>

</div>

<div class="row">
      <div class="col-md-1">
          <div class="form-group"> 
            <label> Cor:   </label>
          </div> 
      </div>

    <div class="col-md-2">
        <div class="form-group">
          <select name="color" class="form-control">
            <option value=""> -- Cor --  </optiomn>
            <?php
                foreach( $dataColors as $color ):
                  $selected = (($selectedColor ?? NULL) == $color->id) ? 'selected' : NULL;
                  echo  "<option value={$color->id} {$selected} > {$color->name} </option>";
                endforeach;
            ?>
          </select> 
        </div>           
    </div>
</div>
 
<input type="hidden"  name="user_id" value="<?php echo $users->user_id ?? NULL ?>">
<input type="submit" class="btn-info btn">
</form>

<?php 
    if(FlashData::hasFlashData()){
        FlashData::getFlashData();
      }
?>

</div>
<?php require_once(TEMPLATE.'/common/bottom.tpl.php'); ?>