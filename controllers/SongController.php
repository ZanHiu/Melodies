<?php 
// SongController.php (Artist)
include_once "models/Song.php";
include_once "models/Genre.php";
switch($action){
    case "songmanager":
        $songs = getAllSongs();
        include "views/artist/songs/index.php";
        break;
        
    case "addsong":
        $songs = getAllSongs();
        $genres = getGenres();
        $artists = getAllArtists();
        include "views/artist/songs/add.php";
        break;
    case "postsong":
        $errors = [];
        $songName=$_POST['songName']??"";
        if($songName == "") {
            array_push($errors, "Vui lòng nhập tên bài hát");
        }
        $path = $_POST['path'] ?? "";
        if ($path == "") {
            array_push($errors, "Vui lòng nhập đường dẫn");
        }
        $img = $_FILES["img"]["name"]??"";
        $target_file = "public/imgs/songs/$img";
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
        $view = $_POST['view']??"";
        if($view == "") {
            array_push($errors, "Vui lòng nhập lượt xem");
        }
        $favourite = $_POST['favourite']??"";
        if($favourite == "") {
            array_push($errors, "Vui lòng nhập lượt thích");
        }
        $created = $_POST['created']??"";
        if($created == "") {
            array_push($errors, "Vui lòng nhập ngày tạo");
        }
        $genre=$_POST['genre']??"";
        $genres = getGenres();
        $artist=$_POST['artist']??"";
        $artists = getAllArtists();
        include "views/artist/songs/add.php";
        if (count($errors) == 0) {      
            addSong($songName, $path, $img, $view, $favourite, $created, $genre, $artist);
            move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
            header("Location: $baseurl/songmanager");
        }
        break;

    case "editsong":
        $id = $_GET['id'];
        $song = getSong($id);
        $genres = getGenres();
        $artists = getAllArtists();
        include "views/artist/songs/edit.php";
        break;
    case "updatesong":
        $errors = [];
        $songName=$_POST['songName']??"";
        if($songName == "") {
            array_push($errors, "Vui lòng nhập tên bài hát");
        }
        $path = $_POST['path'] ?? "";
        if ($path == "") {
            array_push($errors, "Vui lòng nhập đường dẫn");
        }
        $img = $_FILES["img"]["name"]??"";
        $target_file = "public/imgs/songs/$img";
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
        $view = $_POST['view']??"";
        if($view == "") {
            array_push($errors, "Vui lòng nhập lượt xem");
        }
        $favourite = $_POST['favourite']??"";
        if($favourite == "") {
            array_push($errors, "Vui lòng nhập lượt thích");
        }
        $created = $_POST['created']??"";
        if($created == "") {
            array_push($errors, "Vui lòng nhập ngày tạo");
        }
        $id = $_GET['id'];
        $genre=$_POST['genre']??"";
        $genres = getGenres();
        $artist=$_POST['artist']??"";
        $artists = getAllArtists();
        // include "views/artist/songs/edit.php";
        if (count($errors) == 0) {      
            if ($img == "") {
                $oldImg = $_POST['oldImg'] ?? "";
                updateSong($id, $songName, $path, $oldImg, $view, $favourite, $created, $genre, $artist);
            } else {
                updateSong($id, $songName, $path, $img, $view, $favourite, $created, $genre, $artist);
                move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
            }
            header("Location: $baseurl/songmanager");
        }
        break;

    case "deletesong":
        $id = $_GET['id'] ?? "";
        deleteSong($id);
        header("Location: $baseurl/songmanager");
        break;

    case "searchsong":
        $search = $_POST['search'] ?? "";
        $users = searchUser($search); 
        include "views/artist/songs/index.php";
        break;
}
