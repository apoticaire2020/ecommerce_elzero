<?php
      include 'init.php' ;
      include $tpl . 'header.php';
?>

         
<form class="login">
   <input class="form-control" type="text" name="user" placeholder = "Username" autocomplete="off" />
   <input class="form-control" type="password" name="pass" placeholder = "Password" autocomplete="new-password" />
   <input class="btn btn-primary btn-block"  type="submit" value="Login" />
</form>
     
     
<?php

      include $tpl . "footer.php";
?>


