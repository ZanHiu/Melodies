<?php 
// UserController.php (Admin)
include_once "models/User.php";
switch($action){
    case "usermanager":
        $users = getAllUsers();
        include "views/admin/users/index.php";
        break;
        
    case "adduser":
        $users = getAllUsers();
        $subs = getAllSubs();
        include "views/admin/users/add.php";
        break;
    case "postuser":
        $errors = [];
        $name=$_POST['name']??"";
        if($name == "") {
            array_push($errors, "Vui lòng nhập tên người dùng");
        }
        $password = $_POST['password'] ?? "";
        if ($password == "") {
            array_push($errors, "Vui lòng nhập mật khẩu");
        }
        $email=$_POST['email']??"";
        if($email == "") {
            array_push($errors, "Vui lòng nhập email");
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
        $role=$_POST['role']??"";
        if($role == "") {
            array_push($errors, "Vui lòng nhập quyền");
        }
        $sub=$_POST['sub']??"";
        $subs = getAllSubs();
        // include "views/admin/users/add.php";
        if (count($errors) == 0) {      
            addUser($name, $password, $email, $phone, $img, $birthday, $role, $sub);
            move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
            header("Location: $baseurl/usermanager");
        }
        break;

    case "edituser":
        $id = $_GET['id'];
        $user = getUser($id);
        $subs = getAllSubs();
        include "views/admin/users/edit.php";
        break;
    case "updateuser":
        $errors = [];
        $name=$_POST['name']??"";
        if($name == "") {
            array_push($errors, "Vui lòng nhập tên người dùng");
        }
        $password = $_POST['password']??"";
        if ($password == "") {
            array_push($errors, "Vui lòng nhập password");
        }
        $email=$_POST['email']??"";
        if($email == "") {
            array_push($errors, "Vui lòng nhập email");
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
        $role=$_POST['role']??"";
        if($role == "") {
            array_push($errors, "Vui lòng nhập quyền");
        }
        $id = $_GET['id'];
        $sub=$_POST['sub']??"";
        $subs = getAllSubs();
        // include "views/admin/users/edit.php";
        if (count($errors) == 0) {      
            if ($img == "") {
                $oldImg = $_POST['oldImg'] ?? "";
                updateUser($id, $name, $password, $email, $phone, $oldImg, $birthday, $role, $sub);
            } else {
                updateUser($id, $name, $password, $email, $phone, $img, $birthday, $role, $sub);
                move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
            }
            header("Location: $baseurl/usermanager");
        }
        break;

    case "deleteuser":
        $id = $_GET['id'] ?? "";
        deleteUser($id);
        header("Location: $baseurl/usermanager");
        break;

    case "searchuser":
        $search = $_POST['search'] ?? "";
        $users = searchUser($search);
        include "views/admin/users/index.php";
        break;
}