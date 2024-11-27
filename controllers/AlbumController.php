<?php 
// AlbumController.php (Artist)
include_once "models/Genre.php";
include_once "models/Album.php";
switch($action){
    case "albummanager":
        $albums = getAlbums();
        include "views/artist/albums/index.php";
        break;
        
    case "addalbum":
        $albums = getAlbums();
        $artists = getAllArtists();
        include "views/artist/albums/add.php";
        break;
    case "postalbum":
        $errors = [];
        $albumName=$_POST['albumName']??"";
        if($albumName == "") {
            array_push($errors, "Vui lòng nhập tên album");
        }
        $img = $_FILES["img"]["name"]??"";
        $target_file = "public/imgs/albums/$img";
        if ($img == "") {
            array_push($errors, "Ảnh không được để trống");
        } else {
            $imgFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if ($imgFileType != "jpg" && $imgFileType != "png" && $imgFileType != "jpeg"
                && $imgFileType != "gif") {
                array_push($errors, "Ảnh không đúng định dạng");
            }
           
            if (file_exists($target_file)) {
                array_push($errors, "Tên ảnh đã tồn tại");          
            }
            // if ($_FILES["img"]["size"] > 500000) {
            //     array_push($errors, "Kích thước ảnh quá lớn");
            // }
        }
        $created = $_POST['created']??"";
        if($created == "") {
            array_push($errors, "Vui lòng nhập ngày tạo");
        }
        $artist=$_POST['artist']??"";
        $artists = getAllArtists();
        // include "views/artist/albums/add.php";
        if (count($errors) == 0) {      
            addAlbum($albumName, $img, $created, $artist);
            move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
            header("Location: $baseurl/albummanager");
        }
        break;

    case "editalbum":
        $id = $_GET['id'];
        $album = getAlbum($id);
        $artists = getAllArtists();
        include "views/artist/albums/edit.php";
        break;
    case "updatealbum":
        $errors = [];
        $albumName=$_POST['albumName']??"";
        if($albumName == "") {
            array_push($errors, "Vui lòng nhập tên album");
        }
        $img = $_FILES["img"]["name"]??"";
        $target_file = "public/imgs/albums/$img";
        if ($img == "") {
            array_push($errors, "Ảnh không được để trống");
        } else {
            $imgFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if ($imgFileType != "jpg" && $imgFileType != "png" && $imgFileType != "jpeg"
                && $imgFileType != "gif") {
                array_push($errors, "Ảnh không đúng định dạng");
            }
           
            if (file_exists($target_file)) {
                array_push($errors, "Tên ảnh đã tồn tại");                
            }
            // if ($_FILES["img"]["size"] > 500000) {
            //     array_push($errors, "Kích thước ảnh quá lớn");
            // }
        }
        $created = $_POST['created']??"";
        if($created == "") {
            array_push($errors, "Vui lòng nhập ngày tạo");
        }
        $id = $_GET['id'];
        $artist=$_POST['artist']??"";
        $artists = getAllArtists();
        // include "views/artist/albums/edit.php";
        if (count($errors) == 0) {      
            if ($img == "") {
                $oldImg = $_POST['oldImg'] ?? "";
                updateAlbum($id, $albumName, $oldImg, $created, $artist);
            } else {
                updateAlbum($id, $albumName, $img, $created, $artist);
                move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
            }
            header("Location: $baseurl/albummanager");
        }
        break;

    case "deletealbum":
        $id = $_GET['id'] ?? "";
        deleteAlbum($id);
        header("Location: $baseurl/albummanager");
        break;

    case "searchalbum":
        $search = $_POST['search'] ?? "";
        $users = searchAlbum($search); 
        include "views/artist/albums/index.php";
        break;
}
