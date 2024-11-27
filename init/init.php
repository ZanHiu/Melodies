<?php 
 include "config.php";
 session_start();
 $baseurl="http://localhost/duan1/Melodies";
 $action=$_GET['action']??"";
 include "controllers/controller.php";
?>