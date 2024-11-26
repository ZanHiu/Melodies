<?php
// Song.php
function getNewSongs() {
    global $conn;
    $sql = "SELECT songs.*, artists.name FROM songs 
            JOIN artists ON songs.artist_id = artists.id 
            ORDER BY id DESC LIMIT 5";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $songs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $songs;
}

function getViewSongs() {
    global $conn;
    $sql = "SELECT songs.*, artists.name FROM songs 
            JOIN artists ON songs.artist_id = artists.id 
            ORDER BY view DESC LIMIT 5";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $songs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $songs;
}

function getTopSongs() {
    global $conn;
    $sql = "SELECT songs.*,  genres.genreName, artists.name FROM songs 
            JOIN artists ON songs.artist_id = artists.id 
            JOIN genres ON songs.genre_id = genres.id 
            ORDER BY favourite DESC LIMIT 5";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $songs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $songs;
}

function getAllSongs() {
    global $conn;
    $sql = "SELECT songs.*,  genres.genreName, artists.name FROM songs 
            JOIN artists ON songs.artist_id = artists.id 
            JOIN genres ON songs.genre_id = genres.id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $songs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $songs;
}

function getSong($id) {
    global $conn;
    $sql = "SELECT songs.*, artists.name, genres.genreName, albums.albumName, albums.img AS albumImg FROM songs 
            JOIN artists ON songs.artist_id = artists.id 
            JOIN genres ON songs.genre_id = genres.id 
            JOIN listalbums ON songs.id = listalbums.song_id
            JOIN albums ON listalbums.album_id = albums.id 
            WHERE songs.id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $song = $stmt->fetch(PDO::FETCH_ASSOC);
    return $song;
}

function getSongsByGenre($genre_id){
    global $conn;
    $sql = "SELECT songs.*,  genres.genreName, artists.name FROM songs 
            JOIN artists ON songs.artist_id = artists.id 
            JOIN genres ON songs.genre_id = genres.id 
            WHERE genres.id = :genre_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':genre_id', $genre_id, PDO::PARAM_INT);
    $stmt->execute();
    $songs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $songs;
}

function getSongsByAlbum($album_id){
    global $conn;
    $sql = "SELECT songs.*, albums.albumName, artists.name FROM songs 
            JOIN listalbums ON songs.id = listalbums.song_id
            JOIN albums ON listalbums.album_id = albums.id 
            JOIN artists ON songs.artist_id = artists.id
            WHERE albums.id = :album_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':album_id', $album_id, PDO::PARAM_INT);
    $stmt->execute();
    $songs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $songs;
}

function getSongsByArtist($artist_id) {
    global $conn;
    $sql = "SELECT songs.*, artists.name FROM songs 
            JOIN artists ON songs.artist_id = artists.id 
            WHERE artists.id = :artist_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':artist_id', $artist_id);
    $stmt->execute();
    $songs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $songs;
}

function addSong($songName, $path, $img, $view, $favourite, $created, $genre_id, $artist_id) {
    global $conn;
    $sql = "INSERT INTO songs(songName, path, img, view, favourite, created, genre_id, artist_id) VALUES(:songName, :path, :img, :view, :favourite, :created, :genre_id, :artist_id)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':songName', $songName);
    $stmt->bindParam(':path', $path);
    $stmt->bindParam(':img', $img);
    $stmt->bindParam(':view', $view);
    $stmt->bindParam(':favourite', $favourite);
    $stmt->bindParam(':created', $created);
    $stmt->bindParam(':genre_id', $genre_id);
    $stmt->bindParam(':artist_id', $artist_id);
    $stmt->execute();
    return $conn->lastInsertId();
}


function updateSong($id, $songName, $path, $img, $view, $favourite, $created, $genre_id, $artist_id) {
    global $conn;
    $sql = "UPDATE songs SET songName = :songName, path = :path, img = :img, view = :view, favourite = :favourite, created = :created, genre_id = :genre_id, artist_id = :artist_id WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':songName', $songName);
    $stmt->bindParam(':path', $path);
    $stmt->bindParam(':img', $img);
    $stmt->bindParam(':view', $view);
    $stmt->bindParam(':favourite', $favourite);
    $stmt->bindParam(':created', $created);
    $stmt->bindParam(':genre_id', $genre_id);
    $stmt->bindParam(':artist_id', $artist_id);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}


function deleteSong($id) {
    global $conn;  
    $sql = "DELETE FROM songs WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

function searchSong($search) {
    global $conn;
    $sql = "SELECT * FROM songs WHERE songName LIKE :search";
    $stmt = $conn->prepare($sql);
    $searchTerm = '%' . $search . '%';
    $stmt->bindParam(':search', $searchTerm);
    $stmt->execute();
    $songs = $stmt->fetchAll();
    return $songs;
}