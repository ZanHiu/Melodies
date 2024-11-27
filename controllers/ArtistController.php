<?php 
// ArtistController.php (Admin)
include_once "models/Artist.php";
switch($action){
    case "artistmanager":
        $artists = getAllArtists();
        include "views/admin/artists/index.php";
        break;
        
    case "addartist":
        $artists = getAllArtists();
        $users = getAllUsers();
        include "views/admin/artists/add.php";
        break;
    case "postartist":
        $errors = [];
        $name=$_POST['name']??"";
        if($name == "") {
            array_push($errors, "Vui lòng nhập tên nghệ sĩ");
        }
        $phone=$_POST['phone']??"";
        if($phone == "") {
            array_push($errors, "Vui lòng nhập sđt");
        }
        $img = $_FILES["img"]["name"]??"";
        $target_file = "public/imgs/artists/$img";
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
        $birthday=$_POST['birthday']??"";
        if($birthday == "") {
            array_push($errors, "Vui lòng nhập ngày sinh");
        }
        $user=$_POST['user']??"";
        $users = getAllUsers();
        // include "views/admin/artists/add.php";
        if (count($errors) == 0) {      
            addArtist($name, $phone, $img, $birthday, $user);
            move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
            header("Location: $baseurl/artistmanager");
        }
        break;

    case "editartist":
        $id = $_GET['id'];
        $artist = getArtist($id);
        $users = getAllUsers();
        include "views/admin/artists/edit.php";
        break;
    case "updateartist":
        $errors = [];
        $name=$_POST['name']??"";
        if($name == "") {
            array_push($errors, "Vui lòng nhập tên người dùng");
        }
        $phone=$_POST['phone']??"";
        if($phone == "") {
            array_push($errors, "Vui lòng nhập sđt");
        }
        $img = $_FILES["img"]["name"]??"";
        $target_file = "public/imgs/artists/$img";
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
        $birthday=$_POST['birthday']??"";
        if($birthday == "") {
            array_push($errors, "Vui lòng nhập ngày sinh");
        }
        $id = $_GET['id'];
        $user=$_POST['user']??"";
        $users = getAllUsers();
        // include "views/admin/artists/edit.php";
        if (count($errors) == 0) {      
            if ($img == "") {
                $oldImg = $_POST['oldImg'] ?? "";
                updateArtist($id, $name, $phone, $oldImg, $birthday, $user);
            } else {
                updateArtist($id, $name, $phone, $img, $birthday, $user);
                move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
            }
            header("Location: $baseurl/artistmanager");
        }
        break;

    case "deleteartist":
        $id = $_GET['id'] ?? "";
        deleteArtist($id);
        header("Location: $baseurl/artistmanager");
        break;

    case "searchartist":
        $search = $_POST['search'] ?? "";
        $artists = searchArtist($search);
        include "views/admin/artists/index.php";
        break;
}