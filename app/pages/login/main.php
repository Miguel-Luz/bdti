<?php require_once(TEMPLATE.'/common/top.tpl.php'); ?>


<div class="container"> 
<div class="row">
    <div class="col-md-5">
<form action="/action_page.php" method="post">
  <h2></h2>
  
  <div class="input-container">
    <i class="fa fa-envelope icon"></i>
    <input class="input-field" type="text" placeholder="Email" name="email">
  </div>

  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="Password" name="psw">
  </div>

  <button type="submit" class="btn">Register</button>
 </form>
</div>
</div>
</div>
<?php require_once(TEMPLATE.'/common/bottom.tpl.php'); ?>