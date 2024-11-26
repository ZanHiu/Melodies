<?php 
// AlbumController.php (Artist)
include_once "models/User.php";
switch($action){
    case "user":
        $users = getAllUsers();
        include "views/admin/users/index.php";
        break;
        
    case "adduser":
        $users = getAllUsers();
        include "views/admin/users/add.php";
        break;
    case "postuser":
        $errors = [];
        $username=$_POST['username']??"";
        if($username == "") {
            array_push($errors, "Vui lòng nhập username");
        }
        $password = $_POST['password'] ?? "";
        if ($password == "") {
            array_push($errors, "Vui lòng nhập password");
        } else {
            $password = md5($password);
        }
        $email=$_POST['email']??"";
        if($email == "") {
            array_push($errors, "Vui lòng nhập email");
        }
        $phone=$_POST['phone']??"";
        if($phone == "") {
            array_push($errors, "Vui lòng nhập sđt");
        }
        $role_id=$_POST['role_id']??"";
        if($role_id == "") {
            array_push($errors, "Vui lòng nhập role id");
        }
        include "views/admin/users/add.php";
        if (count($errors) == 0) {      
            addUser($username, $password, $email, $phone, $role_id);
            header("Location: $baseurl/user");
        }          
        break;

    case "edituser":
        $id = $_GET['id'];
        $user = getUser($id);
        include "views/admin/users/edit.php";
        break;
    case "updateuser":
        $errors = [];
        $username=$_POST['username']??"";
        if($username == "") {
            array_push($errors, "Vui lòng nhập username");
        }
        $password = $_POST['password']??"";
        if ($password == "") {
            array_push($errors, "Vui lòng nhập password");
        } else {
            $password = md5($password);
        }
        $email=$_POST['email']??"";
        if($email == "") {
            array_push($errors, "Vui lòng nhập email");
        }
        $phone=$_POST['phone']??"";
        if($phone == "") {
            array_push($errors, "Vui lòng nhập sđt");
        }
        $role_id=$_POST['role_id']??"";
        if($role_id == "") {
            array_push($errors, "Vui lòng nhập role id");
        }
        $id = $_GET['id'];
        $users = getAllUsers();
        include "views/admin/users/edit.php";
        if (count($errors) == 0) {
            updateUser($id, $username, $password, $email, $phone, $role_id);
            header("Location: $baseurl/user");
        }
        break;

    case "deleteuser":
        $id = $_GET['id'] ?? "";
        deleteUser($id);
        header("Location: $baseurl/user");
        break;

    case "searchuser":
        $search = $_POST['search'] ?? "";
        $users = searchUser($search); 
        include "views/admin/users/index.php";
        break;
}
