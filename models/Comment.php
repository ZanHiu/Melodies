<?php 
// Comment.php
function getComments(){
    global $conn;
    $sql= "SELECT comments.*, users.name, users.img FROM comments 
           JOIN users ON comments.user_id = users.id";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $comments=$stmt->fetchAll(PDO::FETCH_ASSOC);
    return $comments;
}

function getComment($id){
    global $conn;
    $sql = "SELECT * FROM comments WHERE id = :id";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $comment = $stmt->fetch();
    return $comment;
}

function getCommentsBySong($song_id){
    global $conn;
    $sql = "SELECT comments.*, users.name, users.img FROM comments 
            JOIN users ON comments.user_id = users.id 
            WHERE comments.song_id = :song_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':song_id', $song_id);
    $stmt->execute();
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $comments;
}

function addComment($content, $song_id, $user_id){
    global $conn;
    $sql = "INSERT INTO comments(content, song_id, user_id) VALUES(:content, :song_id, :user_id)";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':song_id',$song_id);
    $stmt->bindParam(':user_id',$user_id);
    $stmt->execute();
    return $conn->lastInsertId();
}


function updateComment($id, $content, $song_id, $user_id){
    global $conn;
    $sql = "UPDATE comments SET content = :content, song_id=:song_id, user_id=:user_id WHERE id = :id";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':song_id',$song_id);
    $stmt->bindParam(':user_id',$user_id);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}


function deleteComment($id){
    global $conn;
    // Những danh mục đã có sản phẩm thì không xóa được cần xử lí thêm  
    // Có thể chuyển sản phẩm vào danh mục mặc định
    $sql= "update comments set song_id = null where song_id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $sql = "DELETE FROM comments WHERE id = :id";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}


function searchComment($search) {
    global $conn;
    $sql = "SELECT * FROM comments WHERE name LIKE :search";
    $stmt = $conn->prepare($sql);
    $searchTerm = '%' . $search . '%';
    $stmt->bindParam(':search', $searchTerm);
    $stmt->execute();
    $comments = $stmt->fetchAll();
    return $comments;
}
