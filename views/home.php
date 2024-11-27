<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Melodies</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet" />
  <link href="<?=$baseurl?>/public/css/style.css" rel="stylesheet" />
  <link href="<?=$baseurl?>/public/css/global.css" rel="stylesheet" />
</head>
<body>
  <!-- Sidebar -->
  <?php include "layouts/sidebar.php" ?>

  <!-- Main content -->
  <div class="main-content">
    <div class="hero">
      <!-- Header -->
      <div class="header">
        <input placeholder="Search for Music, Artists..." type="text" />
        <nav>
          <a href="
            <?php if (isset($_SESSION['login'])){?>
              <?=$baseurl?>/about
            <?php } else { ?>
              <?=$baseurl?>/login
            <?php } ?>
          ">
            About Us
          </a>
          <a href="
            <?php if (isset($_SESSION['login'])){?>
              <?=$baseurl?>/contact
            <?php } else { ?>
              <?=$baseurl?>/login
            <?php } ?>
          ">
            Contact
          </a>
          <a href="#">
            Premium
          </a>
        </nav>
        <div class="auth-buttons">
          <?php if(isset($_SESSION['login'])){?>
          <a class="profile" href="<?=$baseurl?>/profile/<?=$_SESSION['login']['id']?>"><i class="fas fa-user-circle"></i></a>
          <?php } else { ?>
            <a class="login" href="<?=$baseurl?>/login">
              Login
            </a>
            <a class="signup" href="<?=$baseurl?>/register">
              Sign Up
            </a>
          <?php } ?>
        </div>
      </div>

      <!-- Hero content -->
      <div class="hero-content">
        <h1>
          All the
          <span>
            Best Songs
          </span>
          in One Place
        </h1>
        <p>
          On our website, you can access an amazing collection of popular and new songs. Stream your favorite tracks in
          high quality and enjoy without interruptions. Whatever your taste in music, we have it all for you.
        </p>
        <div class="buttons">
          <a class="discover" href="#">
            Discover Now
          </a>
          <a class="create" href="#">
            Create Playlist
          </a>
        </div>
      </div>
    </div>

    <!-- Section -->
    <!-- Weekly Top -->
    <div class="section">
      <h2 class="section-title">
        Most Played
        <span>
          Songs
        </span>
      </h2>
      <div class="songs">
        <?php foreach ($viewSongs as $viewSong) {?>
          <div class="song">
            <img alt="" src="<?=$baseurl?>/public/imgs/songs/<?=$viewSong['img']?>"/>
            <p class="title">
              <?=$viewSong['songName']?>
            </p>
            <p class="artist-name">
              <?=$viewSong['name']?>
            </p>
          </div>
        <?php }?>
        <a class="view-all" href="#">
          <div class="icon"><i class="fas fa-plus"></i></div>
          <p>View all</p>
        </a>
      </div>
    </div>

    <!-- New Release -->
    <div class="section">
      <h2 class="section-title">
        New Release
        <span>
          Songs
        </span>
      </h2>
      <div class="songs">
        <?php foreach ($newSongs as $newSong) {?>
          <div class="song">
            <img alt="" src="<?=$baseurl?>/public/imgs/songs/<?=$newSong['img']?>"/>
            <p class="title">
              <?=$newSong['songName']?>
            </p>
            <p class="artist-name">
              <?=$newSong['name']?>
            </p>
          </div>
        <?php }?>
        <a class="view-all" href="#">
          <div class="icon"><i class="fas fa-plus"></i></div>
          <p>View all</p>
        </a>
      </div>
    </div>

    <!-- Trending -->
    <div class="section">
      <h2 class="section-title mb-0">
        Trending
        <span>
          Songs
        </span>
      </h2>
      <table class="song-list">
        <tr class="song-list-header">
          <td></td>
          <td></td>
          <td>Release Date</td>
          <td>Album</td>
          <td></td>
          <td>Time</td>
        </tr>
        <?php foreach ($topSongs as $index => $topSong) {?>
          <tr class="song-item">
            <td class="song-index">
              <?=$index+1?>
            </td>
            <td class="song-infor">
              <img alt="" height="60"
                src="<?=$baseurl?>/public/imgs/songs/<?=$topSong['img']?>"
                width="60" />
                <div class="song-name">
                  <?=$topSong['songName']?>
                  <div class="song-artist"><?=$topSong['name']?></div>
                </div>
            </td>
            <td><?=$topSong['created']?></td>
            <td><?=$topSong['genreName']?></td>
            <td>
              <i class="fas fa-heart"></i>
            </td>
            <td class="song-time">3:26</td>
          </tr>
        <?php }?>
      </table>
      <div class="btn-wrapper">
        <a class="view-all-btn" href="#">
          <!-- <div class="icon"></div> -->
          <i class="fas fa-plus"></i>
          View All
        </a>
      </div>
    </div>

    <!-- Popular Artists -->
    <div class="section">
      <h2 class="section-title">
        Popular
        <span>
          Artists
        </span>
      </h2>
      <div class="artists">
        <?php foreach ($artists as $artist) {?>
          <div class="artist">
            <img alt=""
              src="<?=$baseurl?>/public/imgs/artists/<?=$artist['img']?>"/>
            <p class="title">
              <?=$artist['name']?>
            </p>
          </div>
        <?php }?>
        <a class="view-all" href="#">
          <div class="icon"><i class="fas fa-plus"></i></div>
          <p>View all</p>
        </a>
      </div>
    </div>

    <!-- Music Video -->
    <div class="section">
      <h2 class="section-title">
        Music
        <span>
          Video
        </span>
      </h2>
      <div class="videos">
        <div class="video">
          <img alt="Album cover of 'Time' by Luciano"
            src="https://storage.googleapis.com/a1aa/image/ghCZNIIcOtq0L5zNuMlyxq0gL30kVbkfPpoYpfGT5MEmRfWnA.jpg"/>
          <p class="title">
            Time
          </p>
          <p class="artist-name">
            Luciano
          </p>
          <p class="view-count">3M views</p>
        </div>
        <div class="video">
          <img alt="Album cover of '112' by joznez"
            src="https://storage.googleapis.com/a1aa/image/XepVlVee5PUHRo1BkMI7ZBYxzL8AOFq88CO6VSWLj7xjjetOB.jpg"/>
          <p class="title">
            112
          </p>
          <p class="artist-name">
            joznez
          </p>
          <p class="view-count">3M views</p>
        </div>
        <div class="video">
          <img alt="Album cover of 'We Don't Care' by Kyanu &amp; DJ Gollum"
            src="https://storage.googleapis.com/a1aa/image/dPeJMsgwWjzQDiMT17iqaS4aShiQSkHLgF6n8me4ICAqRfWnA.jpg"/>
          <p class="title">
            We Don't Care
          </p>
          <p class="artist-name">
            Kyanu &amp; DJ Gollum
          </p>
          <p class="view-count">3M views</p>
        </div>
        <a class="view-all" href="#">
          <div class="icon"><i class="fas fa-plus"></i></div>
          <p>View all</p>
        </a>
      </div>
    </div>

    <!-- Top Albums -->
    <div class="section">
      <h2 class="section-title">
        Top
        <span>
          Albums
        </span>
      </h2>
      <div class="songs">
        <?php foreach ($albums as $album) {?>
          <div class="song">
            <img alt="" src="<?=$baseurl?>/public/imgs/albums/<?=$album['img']?>"/>
            <p class="title">
              <?=$album['albumName']?>
            </p>
            <p class="artist-name">
              <?=$album['name']?>
            </p>
          </div>
        <?php }?>
        <a class="view-all" href="#">
          <div class="icon"><i class="fas fa-plus"></i></div>
          <p>View all</p>
        </a>
      </div>
    </div>

    <?php include "layouts/footer.php" ?>