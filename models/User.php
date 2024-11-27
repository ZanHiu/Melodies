<?php 
function register($name, $password, $email, $phone){
    global $conn;
    $sql = "INSERT INTO users(name,password,email,phone) VALUES(:name, :password, :email, :phone)";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':phone',$phone);
    $stmt->execute();
    return $conn->lastInsertId();
}

function checkExistUser($email){
    global $conn;
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch();
    return $user; 
}

function login($email, $password){
    global $conn;
    $sql = "SELECT id, name, email, role, sub_id FROM users WHERE email = :email AND password = :password";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $user = $stmt->fetch();
    return $user;
}

function getAllUsers(){
    global $conn;
    $sql = "SELECT users.*, subscriptions.type FROM users LEFT JOIN subscriptions ON users.sub_id = subscriptions.id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

function getUser($id) {
    global $conn;
    $sql = "SELECT * FROM users WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user;
}

function getAllSubs() {
    global $conn;
    $sql = "SELECT * FROM subscriptions";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $subs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $subs;
}

function addUser($name, $password, $email, $phone, $img, $birthday, $role, $sub_id) {
    global $conn;
    $sql = "INSERT INTO users(name,password,email,phone,img,birthday,role,sub_id) VALUES(:name, :password, :email, :phone, :img, :birthday, :role, :sub_id)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':img', $img);
    $stmt->bindParam(':birthday', $birthday);
    $stmt->bindParam(':role', $role);
    $stmt->bindParam(':sub_id', $sub_id);
    $stmt->execute();
    return $conn->lastInsertId();
}

function updateUser($id, $name, $password, $email, $phone, $img, $birthday, $role, $sub_id) {
    global $conn;
    $sql = "UPDATE users SET name = :name, password = :password, email = :email, phone = :phone, img = :img, birthday = :birthday, role = :role, sub_id = :sub_id WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':img', $img);
    $stmt->bindParam(':birthday', $birthday);
    $stmt->bindParam(':role', $role);
    $stmt->bindParam(':sub_id', $sub_id);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

function deleteUser($id) {
    global $conn;  
    $sql = "DELETE FROM users WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

function searchUser($search) {
    global $conn;
    $sql = "SELECT * FROM users WHERE name LIKE :search";
    $stmt = $conn->prepare($sql);
    $searchTerm = '%' . $search . '%';
    $stmt->bindParam(':search', $searchTerm);
    $stmt->execute();
    $users = $stmt->fetchAll();
    return $users;
}