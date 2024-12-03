<?php 
 include "config.php";
 session_start();
 $baseurl="http://localhost/PRO1014/Assignments/Melodies";
 $action=$_GET['action']??"";
 include "controllers/controller.php";
?>