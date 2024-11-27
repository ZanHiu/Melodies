<?php
// Artist.php
function getTopArtists() {
    global $conn;
    $sql = "SELECT * FROM artists LIMIT 6";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $artists = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $artists;
}
function getAllArtists() {
    global $conn;
    $sql = "SELECT artists.*, users.name as username FROM artists LEFT JOIN users ON artists.user_id = users.id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $artists = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $artists;
}

function getArtist($id) {
    global $conn;
    $sql = "SELECT * FROM artists WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $artist = $stmt->fetch(PDO::FETCH_ASSOC);
    return $artist;
}

function addArtist($name, $phone, $img, $birthday, $user_id) {
    global $conn;
    $sql = "INSERT INTO artists(name, phone, img, birthday, user_id) VALUES(:name, :phone, :img, :birthday, :user_id)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':img', $img);
    $stmt->bindParam(':birthday', $birthday);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    return $conn->lastInsertId();
}


function updateArtist($id, $name, $phone, $img, $birthday, $user_id) {
    global $conn;
    $sql = "UPDATE artists SET name = :name, phone = :phone, img = :img, birthday = :birthday, user_id = :user_id WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':img', $img);
    $stmt->bindParam(':birthday', $birthday);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}


function deleteArtist($id) {
    global $conn;  
    $sql = "DELETE FROM artists WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

function searchArtist($search) {
    global $conn;
    $sql = "SELECT * FROM artists WHERE name LIKE :search";
    $stmt = $conn->prepare($sql);
    $searchTerm = '%' . $search . '%';
    $stmt->bindParam(':search', $searchTerm);
    $stmt->execute();
    $artists = $stmt->fetchAll();
    return $artists;
}