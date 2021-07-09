<?php

   function lang ($phrase)
   {
     static $lang = array(
        //HOMEPAGE
        'MESSAGE' => 'WELCOME',
        'ADMIN' =>  'ADMINISTRATOR'

     );
     return $lang[$phrase];

   }