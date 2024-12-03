<?php 
// Album.php
function getListAlbums(){
    global $conn;
    $sql = "SELECT listalbums.*, albums.albumName, songs.songName FROM listalbums 
            JOIN albums ON listalbums.album_id = albums.id
            JOIN songs ON listalbums.song_id = songs.id";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $listalbums=$stmt->fetchAll(PDO::FETCH_ASSOC);
    return $listalbums;
}

function getListAlbum($id){
    global $conn;
    $sql = "SELECT * FROM listalbums WHERE id = :id";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $listalbum = $stmt->fetch();
    return $listalbum;
}

function addListAlbum($album_id, $song_id){
    global $conn;
    $sql = "INSERT INTO listalbums(album_id, song_id) VALUES(:album_id, :song_id)";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':album_id', $album_id);
    $stmt->bindParam(':song_id', $song_id);
    $stmt->execute();
    return $conn->lastInsertId();
}

function updateListAlbum($id, $album_id, $song_id){
    global $conn;
    $sql = "UPDATE listalbums SET album_id=:album_id, song_id=:song_id WHERE id = :id";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':album_id', $album_id);
    $stmt->bindParam(':song_id', $song_id);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

function deleteListAlbum($id){
    global $conn;
    // Những danh mục đã có sản phẩm thì không xóa được cần xử lí thêm  
    // Có thể chuyển sản phẩm vào danh mục mặc định
    $sql= "UPDATE listalbums SET song_id = null WHERE song_id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $sql = "DELETE FROM listalbums WHERE id = :id";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

function searchListAlbum($search) {
    global $conn;
    $sql = "SELECT * FROM listalbums WHERE id LIKE :search";
    $stmt = $conn->prepare($sql);
    $searchTerm = '%' . $search . '%';
    $stmt->bindParam(':search', $searchTerm);
    $stmt->execute();
    $listalbums = $stmt->fetchAll();
    return $listalbums;
}