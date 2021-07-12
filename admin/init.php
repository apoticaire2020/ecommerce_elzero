<?php
   
       // ROUTES
   include  'connect.php' ;
    $tpl = 'includes/templates/';
    $lycss = 'layout/css/' ;
    $lyjs = 'layout/js/' ;

       //INCLUDE  THE IMPORTANTS  FILES    
    include $tpl . 'header.php';

        //include navbar on all pages expect the one with $noNavbar variable
    if (!isset($noNavbar)) {  include $tpl . 'navbar.php';}
   

    