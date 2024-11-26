<?php 
// AuthController.php
include_once "models/User.php";
include_once "models/Follow.php";
switch ($action) {
    case 'login':
        include "views/auth/login.php";
        break;
    case 'register':
        include "views/auth/register.php";
        break;
    case 'postlogin':
        $errors=[];
        $email = $_POST['email']??"";
        if($email==""){
            array_push($errors,"Vui lòng nhập email");
        }
        $password = $_POST['password']??"";
        if($password==""){
            array_push($errors,"Vui lòng nhập password");
        }        
        // $password = md5($password);
        $user = login($email, $password);
        if(!$user){
            array_push($errors, "Email hoặc password không đúng");
        }
        // include "views/auth/login.php";
        if($user && count($errors)==0){
            $_SESSION['login'] = $user; 
            if(isset($_SESSION['redirectto'])){
                header("Location: $_SESSION[redirectto]");
                unset($_SESSION['redirectto']);
            }else {
                header("Location: $baseurl");
            }
        }
        break;
    case 'logout':
        unset($_SESSION['login']);
        header("Location: $baseurl");
        break;
    case "postregister":
        $errors=[];
        $name = $_POST['name']??"";
        if($name==""){
            array_push($errors,"Vui lòng nhập name");
        }
        $password = $_POST['password']??"";    
        if($password==""){
            array_push($errors,"Vui lòng nhập password");
        }
        $email = $_POST['email']??"";
        if($email==""){
            array_push($errors,"Vui lòng nhập email");
        }
        $phone = $_POST['phone']??"";    
        if($phone==""){
            array_push($errors,"Vui lòng nhập phone");
        }
        // $repeatPassword= $_POST['re_password']??"";
        // if($repeatPassword==""){
        //     array_push($errors,"Vui lòng nhập lại password");
        // }
        // if($password!=$repeatPassword){
        //     array_push($errors,"Password nhập lại không đúng");
        // }
        if(checkExistUser($email)){
            array_push($errors,"Email đã tồn tại");
        }
        if(!str_contains($email,'@')){
            array_push($errors,"Email không đúng định dạng");
        }
        // include "views/auth/register.php";
        if(count($errors)==0){
            // $password = md5($password);
            register($name, $password, $email, $phone);
            header("Location: $baseurl/login");
        }
        break;
    case 'profile':
        $id = $_GET['id'] ?? "";
        $user = getUser($id);
        $follows = getFollowsByArtist($id);
        include "views/auth/profile.php";
        break;
}