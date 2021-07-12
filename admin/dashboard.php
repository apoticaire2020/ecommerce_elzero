<?php
      session_start();
     
     if(isset($_SESSION['Username'])){
             // echo 'welcome to '. $_SESSION['Username']  ;
             include 'init.php';
               echo 'salam';

             include $tpl . "footer.php";
     }
     else{
 
        //echo 'you are not autorized to view this page';
        header('Location:index.php');
     } 