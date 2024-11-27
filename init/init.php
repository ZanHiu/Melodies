<?php 
 include "config.php";
 session_start();
 $baseurl="http://localhost/DU_AN_1/Melodies";
 $action=$_GET['action']??"";
 include "controllers/controller.php";
?>