<?php 
// Album.php
function getAlbums(){
    global $conn;
    $sql = "SELECT albums.*, artists.name FROM albums 
            JOIN artists ON albums.artist_id = artists.id";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $albums=$stmt->fetchAll(PDO::FETCH_ASSOC);
    return $albums;
}

function getTopAlbums(){
    global $conn;
    $sql = "SELECT albums.*, artists.name FROM albums 
            JOIN artists ON albums.artist_id = artists.id 
            LIMIT 5";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $albums=$stmt->fetchAll(PDO::FETCH_ASSOC);
    return $albums;
}

function getAlbum($id){
    global $conn;
    $sql = "SELECT * FROM albums WHERE id = :id";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $album = $stmt->fetch();
    return $album;
}

function addAlbum($albumName, $img, $created, $artist_id){
    global $conn;
    $sql = "INSERT INTO albums(albumName, img, created, artist_id) VALUES(:albumName, :img, :created, :artist_id)";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':albumName', $albumName);
    $stmt->bindParam(':img', $img);
    $stmt->bindParam(':created', $created);
    $stmt->bindParam(':artist_id', $artist_id);
    $stmt->execute();
    return $conn->lastInsertId();
}


function updateAlbum($id, $albumName, $img, $created, $artist_id){
    global $conn;
    $sql = "UPDATE albums SET albumName = :albumName, img=:img, created = :created, artist_id = :artist_id WHERE id = :id";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':albumName', $albumName);
    $stmt->bindParam(':img',$img);
    $stmt->bindParam(':created', $created);
    $stmt->bindParam(':artist_id', $artist_id);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}


function deleteAlbum($id){
    global $conn;
    // Những danh mục đã có sản phẩm thì không xóa được cần xử lí thêm  
    // Có thể chuyển sản phẩm vào danh mục mặc định
    $sql= "update albums set artist_id = null where artist_id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $sql = "DELETE FROM albums WHERE id = :id";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}


function searchAlbum($search) {
    global $conn;
    $sql = "SELECT * FROM albums WHERE name LIKE :search";
    $stmt = $conn->prepare($sql);
    $searchTerm = '%' . $search . '%';
    $stmt->bindParam(':search', $searchTerm);
    $stmt->execute();
    $albums = $stmt->fetchAll();
    return $albums;
}