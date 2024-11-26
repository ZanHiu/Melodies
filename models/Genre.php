<?php 
// Genre.php
function getGenres(){
    global $conn;
    $sql="SELECT * FROM genres";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $genres=$stmt->fetchAll(PDO::FETCH_ASSOC);
    return $genres;
}

function getTopGenres(){
    global $conn;
    $sql="SELECT * FROM genres LIMIT 4";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $genres=$stmt->fetchAll(PDO::FETCH_ASSOC);
    return $genres;
}

function getGenre($id){
    global $conn;
    $sql = "SELECT * FROM genres WHERE id = :id";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $genre = $stmt->fetch();
    return $genre;
}

function addGenre($genreName, $img){
    global $conn;
    $sql = "INSERT INTO genres(genreName,img) VALUES(:genreName, :img)";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':genreName', $genreName);
    $stmt->bindParam(':img',$img);
    $stmt->execute();
    return $conn->lastInsertId();
}


function updateGenre($id, $genreName, $img){
    global $conn;
    $sql = "UPDATE genres SET genreName = :genreName, img=:img WHERE id = :id";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':genreName', $genreName);
    $stmt->bindParam(':img',$img);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}


function deleteGenre($id){
    global $conn;
    // Những danh mục đã có sản phẩm thì không xóa được cần xử lí thêm  
    // Có thể chuyển sản phẩm vào danh mục mặc định
    $sql= "update songs set genre_id = null where genre_id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $sql = "DELETE FROM genres WHERE id = :id";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}


function searchGenre($search) {
    global $conn;
    $sql = "SELECT * FROM genres WHERE name LIKE :search";
    $stmt = $conn->prepare($sql);
    $searchTerm = '%' . $search . '%';
    $stmt->bindParam(':search', $searchTerm);
    $stmt->execute();
    $genres = $stmt->fetchAll();
    return $genres;
}
