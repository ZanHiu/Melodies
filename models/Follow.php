<?php 
// Comment.php
function getFollows(){
    global $conn;
    $sql= "SELECT follows.*, users.name, users.img FROM follows 
           JOIN users ON follows.user_id = users.id";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $follows=$stmt->fetchAll(PDO::FETCH_ASSOC);
    return $follows;
}

function getFollow($id){
    global $conn;
    $sql = "SELECT * FROM follows WHERE id = :id";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $follow = $stmt->fetch();
    return $follow;
}

function getFollowsByArtist($artist_id){
    global $conn;
    $sql = "SELECT follows.*, artists.name, artists.img FROM follows 
            JOIN artists ON follows.artist_id = artists.id 
            WHERE follows.artist_id = :artist_id";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':artist_id', $artist_id);
    $stmt->execute();
    $follows = $stmt->fetch();
    return $follows;
}

function getFollowsByUser($user_id){
    global $conn;
    $sql = "SELECT follows.*, users.name, users.img FROM follows 
            JOIN users ON follows.user_id = users.id 
            WHERE follows.user_id = :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $follows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $follows;
}

function addFollow($artist_id, $user_id){
    global $conn;
    $sql = "INSERT INTO follows(artist_id, user_id) VALUES(:artist_id, :user_id)";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':artist_id',$artist_id);
    $stmt->bindParam(':user_id',$user_id);
    $stmt->execute();
    return $conn->lastInsertId();
}


function updateFollow($id, $artist_id, $user_id){
    global $conn;
    $sql = "UPDATE follows SET artist_id=:song_id, user_id=:user_id WHERE id = :id";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':artist_id',$artist_id);
    $stmt->bindParam(':user_id',$user_id);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}


function deleteFollow($id){
    global $conn;
    // Những danh mục đã có sản phẩm thì không xóa được cần xử lí thêm  
    // Có thể chuyển sản phẩm vào danh mục mặc định
    $sql= "update follows set artist_id = null where artist_id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $sql = "DELETE FROM follows WHERE id = :id";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}


function searchFollow($search) {
    global $conn;
    $sql = "SELECT * FROM follows WHERE name LIKE :search";
    $stmt = $conn->prepare($sql);
    $searchTerm = '%' . $search . '%';
    $stmt->bindParam(':search', $searchTerm);
    $stmt->execute();
    $follows = $stmt->fetchAll();
    return $follows;
}
