<?php
   
       // ROUTES
   include  'connect.php' ;
    $tpl = 'includes/templates/';
    $lang ='includes/languages/';
    $func = 'includes/functions/';
    $lycss = 'layout/css/' ;
    $lyjs = 'layout/js/' ;
  

       //INCLUDE  THE IMPORTANTS  FILES    
    include $func . 'functions.php' ;
    include $lang . 'english.php';   
    include $tpl . 'header.php';
    include $lyjs . 'backend.js' ;


        //include navbar on all pages expect the one with $noNavbar variable
    if (!isset($noNavbar)) {  include $tpl . 'navbar.php';}
   

    