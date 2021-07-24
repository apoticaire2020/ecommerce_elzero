<?php

   function lang ($phrase)
   {
     static $lang = array(
        //nave bar links
        'HOME_ADMIN' => 'home',
        'CATEGORIES' =>  'Categories',
        'ITEMS'      =>  'Items' ,
        'MEMBERS'    =>  'Members',
        'STATISTICS' =>  'Statistics',
        'LOGS'       =>  'Logs',

     );
     return $lang[$phrase];

   }