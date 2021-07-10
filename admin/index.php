<?php
      include 'init.php' ;
      include $tpl . 'header.php';

      // check if user is coming from http  post request
if($_SERVER['REQUEST_METHOD']=='POST')
{
     $username = $_POST['user'];
     $password = $_POST['pass'];

    $hashPass = sha1($password);

    
}
    // check if user exist in database
    $stm =$con->prepare("select Username , Password from users where Username=? and Password=? and GroupID =1 ");
    $stm->execute(array($username ,$hashPass));
    $count = $stm->rowCount();
    if($count>0){
          echo 'success ' . 'welcome ' . $username;
    }
    else echo 'failed';
?>
  
<form class="login" action= "<?php echo $_SERVER['PHP_SELF']   ?>" method ='POST'>

<h3>Admin Login</h3>      
   <input class="form-control input-lg" type="text" name="user" placeholder = "Username" autocomplete="off" />
   <input class="form-control input-lg" type="password" name="pass" placeholder = "Password" autocomplete="new-password" />
   <input class="btn btn-primary btn-block"  type="submit" value="Login" />
</form>
     
     
<?php

      include $tpl . "footer.php";
?>


