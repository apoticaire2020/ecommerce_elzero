<?php

   $do = isset($_GET['do']) ? $_GET['do'] : 'manage' ;

  
  
   // if the page is the main page

   if ($do == 'manage') {
     echo 'welcome in the mange page';
     echo '<a href="?do=insert">add new category</a>';
   }
   elseif ($do=='add') {
    echo 'welcome in the add page';
   }
   elseif ($do=='insert') {
    echo 'welcome in the insert page';
   }
   else {
     echo 'error there\'s no page';
   }

?>