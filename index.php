<?php 
   include_once("controller/controller.php");

   $controller = new Controller();
   //get requested page from URL
   if(empty($_REQUEST["page"])) {
     $page="index";
   } else { 
    $page=$_REQUEST["page"];
  }
  //use URL variable to call functions from controller.  
  $controller->$page();