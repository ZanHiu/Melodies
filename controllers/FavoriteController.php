<?php
 // FavoriteController.php
 include_once "models/Album.php";
 include_once "models/Artist.php";
 include_once "models/Genre.php";
 include_once "models/Song.php";
 include_once "models/User.php";
 include_once "models/Comment.php";
 $actived = "";
 switch($action){
   case 'favorites':
     $actived = "favorites";
     include "views/favorites.php";
     break;
   case 'addfavorite':
     $id = $_GET['id'] ?? "";
     if (isset($_SESSION['favorites'][$id])) {
         unset($_SESSION['favorites'][$id]);
     } else {
         $_SESSION['favorites'][$id] = getSong($id);
     }
     header("Location: $baseurl/favorites");
     break;
 }
?>