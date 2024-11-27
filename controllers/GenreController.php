<?php 
// GenreController.php (Admin)
include_once "models/Genre.php";
switch($action){
    case "genremanager":
        $genres = getGenres();
        include "views/admin/genres/index.php";
        break;
        
    case "addgenre":
        $genres = getGenres();
        include "views/admin/genres/add.php";
        break;
    case "postgenre":
        $errors = [];
        $genreName=$_POST['genreName']??"";
        if($genreName == "") {
            array_push($errors, "Vui lòng nhập tên thể loại");
        }
        $img = $_FILES["img"]["name"]??"";
        $target_file = "public/imgs/genres/$img";
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
        // include "views/admin/genres/add.php";
        if (count($errors) == 0) {      
            addGenre($genreName, $img);
            move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
            header("Location: $baseurl/genremanager");
        }
        break;

    case "editgenre":
        $id = $_GET['id'];
        $genre = getGenre($id);
        include "views/admin/genres/edit.php";
        break;
    case "updategenre":
        $errors = [];
        $genreName=$_POST['genreName']??"";
        if($genreName == "") {
            array_push($errors, "Vui lòng nhập tên thể loại");
        }
        $img = $_FILES["img"]["name"]??"";
        $target_file = "public/imgs/genres/$img";
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
        $id = $_GET['id'];
        // include "views/admin/artists/edit.php";
        if (count($errors) == 0) {      
            if ($img == "") {
                $oldImg = $_POST['oldImg'] ?? "";
                updateGenre($id, $genreName, $oldImg);
            } else {
                updateGenre($id, $genreName, $img);
                move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
            }
            header("Location: $baseurl/genremanager");
        }
        break;

    case "deletegenre":
        $id = $_GET['id'] ?? "";
        deleteGenre($id);
        header("Location: $baseurl/genremanager");
        break;

    case "searchgenre":
        $search = $_POST['search'] ?? "";
        $genres = searchGenre($search);
        include "views/admin/genres/index.php";
        break;
}