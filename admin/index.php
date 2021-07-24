<?php
      session_start();

      $noNavbar = '';
      $pageTitle = 'Login';
     if(isset($_SESSION['Username'])){
      header('Location:dashboard.php'); 
     }
      include 'init.php' ;
     
      // check if user is coming from http  post request
      $username ='';
      $hashPass ='';
if($_SERVER['REQUEST_METHOD']=='POST')
{
     $username = $_POST['user'];
     $password = $_POST['pass'];

    $hashPass = sha1($password);

    
}
    // check if user exist in database
    $stm =$con->prepare("SELECT 
                           UserID , Username , Password 
                        from 
                             users 
                        where 
                             Username=? 
                        and 
                              Password=? 
                        and 
                              GroupID =1 
                        limit
                               1");
    $stm->execute(array($username ,$hashPass));
    $row = $stm->fetch();
    $count = $stm->rowCount();
    if($count>0){
         // echo 'success ' . 'welcome ' . $username;
       $_SESSION['Username']=$username;
       $_SESSION['ID']=$row['UserID'];
       header('Location:dashboard.php');
       exit();
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


