<?php 
// DiscoverController.php
include_once "models/Album.php";
include_once "models/Artist.php";
include_once "models/Genre.php";
include_once "models/Song.php";
include_once "models/User.php";
include_once "models/Comment.php";
$actived = "";
  switch($action){
    case 'discover':
      $actived = "discover";
      $genres=getTopGenres();
      $artists=getTopArtists();
      $albums=getTopAlbums();
      $newSongs=getNewSongs();
      include "views/discover/discover.php";
      break;
    case 'genre':
      $actived = "genres";
      $id = $_GET['id'] ?? "";
      $album = getGenre($id);
      $genres=getGenres();
      $songs = getSongsByGenre($id);
      include "views/discover/genre.php";
      break;
    case 'album':
      $actived = "albums";
      $id = $_GET['id'] ?? "";
      $album = getAlbum($id);
      $albums=getAlbums();
      $songs = getSongsByAlbum($id);
      include "views/discover/album.php";
      break;
    case 'artist':
      $actived = "artists";
      $id = $_GET['id'] ?? "";
      $artist = getArtist($id);
      $artists=getAllArtists();
      $songs = getSongsByArtist($id);
      include "views/discover/artist.php";
      break;
    case 'song':
      $id = $_GET['id'] ?? "";
      $song = getSong($id);
      $songs = getSongsByAlbum($id);
      $comments = getCommentsBySong($id);
      include "views/discover/song.php";
      break;
  }