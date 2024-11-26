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
    $sql = "SELECT * FROM artists";
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

function addArtist($name, $phone, $email, $img, $birthday) {
    global $conn;
    $sql = "INSERT INTO artists(name, phone, email, img, birthday) VALUES(:name, :phone, :email, :img, :birthday)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':img', $img);
    $stmt->bindParam(':birthday', $birthday);
    $stmt->execute();
    return $conn->lastInsertId();
}


function updateArtist($id, $name, $phone, $email, $img, $birthday) {
    global $conn;
    $sql = "UPDATE artists SET name = :name, phone = :phone, email = :email, img = :img, birthday = :birthday WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':img', $img);
    $stmt->bindParam(':birthday', $birthday);
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