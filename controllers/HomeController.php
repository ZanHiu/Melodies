<?php 
include_once "models/Genre.php";
include_once "models/Song.php";
include_once "models/Artist.php";
include_once "models/Album.php";
include_once "models/User.php";
$actived = "";
switch ($action) {
    case '':
        $actived = "";
        $albums=getTopAlbums();
        $artists=getTopArtists();
        $newSongs=getNewSongs();
        $viewSongs=getViewSongs();
        $topSongs=getTopSongs();
        include "views/home.php"; 
        break;
    case 'albums':
        $actived = "albums";
        $albums=getAlbums();
        include "views/albums.php";
        break;
    case 'genres':
        $actived = "genres";
        $genres=getGenres();
        include "views/genres.php";
        break;
    case 'artists':
        $actived = "artists";
        $artists=getAllArtists();
        include "views/artists.php";
        break;
    case 'mostplayed':
        $viewSongs=getViewSongs();
        $actived = "mostplayed";
        include "views/mostPlayed.php";
        break;
    case 'contact':
        $actived = "contact";
        include "views/contact.php";
        break;
    case 'about':
        $actived = "about";
        include "views/about.php";
        break;
    case 'sendmail':
        include "views/sendmail.php";
        break;
    // case 'help':
    //     $actived = "help";
    //     include "views/help.php";
    //     break;
    // case 'faqs':
    //     $actived = "faqs";
    //     include "views/faqs.php";
    //     break;
}
?>