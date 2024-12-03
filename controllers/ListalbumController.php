<?php 
// AlbumController.php (Artist)
include_once "models/Listalbum.php";
include_once "models/Song.php";
include_once "models/Album.php";
switch($action){
    case "listalbummanager":
        $listalbums = getListAlbums();
        include "views/artist/listalbums/index.php";
        break;
        
    case "addlistalbum":
        $listalbums = getListAlbums();
        $albums = getAlbums();
        $songs = getAllSongs();
        include "views/artist/listalbums/add.php";
        break;
    case "postlistalbum":
        $errors = [];
        $song=$_POST['song']??"";
        $songs = getAllSongs();
        $album=$_POST['album']??"";
        $albums = getAlbums();
        // include "views/artist/albums/add.php";
        if (count($errors) == 0) {      
            addListAlbum($album, $song);
            header("Location: $baseurl/listalbummanager");
        }
        break;

    case "editlistalbum":
        $id = $_GET['id'];
        $listalbum=getListAlbum($id);
        $songs = getAllSongs();
        $albums = getAlbums();
        include "views/artist/listalbums/edit.php";
        break;
    case "updatelistalbum":
        $errors = [];
        $id = $_GET['id'];
        $song=$_POST['song']??"";
        $songs = getAllSongs();
        $album=$_POST['album']??"";
        $albums = getAlbums();
        // include "views/artist/albums/edit.php";
        if (count($errors) == 0) {      
            updateListAlbum($id, $album, $song);
            header("Location: $baseurl/listalbummanager");
        }
        break;

    case "deletelistalbum":
        $id = $_GET['id'] ?? "";
        deleteListAlbum($id);
        header("Location: $baseurl/listalbummanager");
        break;

    case "searchlistalbum":
        $search = $_POST['search'] ?? "";
        $listalbums = searchListAlbum($search); 
        include "views/artist/listalbums/index.php";
        break;
}
