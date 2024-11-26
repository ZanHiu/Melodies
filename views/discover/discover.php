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
  <?php include "views/layouts/sidebar.php" ?>

  <!-- Main content -->
  <div class="main-content">
    <div class="sub-hero">
      <!-- Header -->
      <?php include "views/layouts/header.php" ?>

      <!-- Hero content -->
      <div class="sub-hero-content ml-0">
        <h2 class="sub-hero-title">
          Music
          <span>
            Genres
          </span>
        </h2>
        <div class="music-genres">
          <?php foreach ($genres as $genre) { ?>
            <a href="<?=$baseurl?>/genre/<?= $genre['id']?>">
              <div class="genre">
                <img alt=""
                  src="<?=$baseurl?>/public/imgs/genres/<?=$genre['img']?>"/>
                <p class="title">
                  <?=$genre['genreName']?>
                </p>
              </div>
            </a>
          <?php } ?>
          <a class="view-all" href="#">
            <div class="icon"><i class="fas fa-plus"></i></div>
            <p>View all</p>
          </a>
        </div>
      </div>
    </div>

    <!-- Section -->
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
          <a href="<?=$baseurl?>/artist/<?= $artist['id']?>">
            <div class="artist">
              <img alt=""
                src="<?=$baseurl?>/public/imgs/artists/<?=$artist['img']?>"/>
              <p class="title">
                <?=$artist['name']?>
              </p>
            </div>
          </a>
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
        <div class="left-col">
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
        </div>
        <div class="right-col">
          <a class="view-all" href="#">
            <div class="icon"><i class="fas fa-plus"></i></div>
            <p>View all</p>
          </a>
        </div>
      </div>
    </div>

    <!-- New Release Songs -->
    <div class="section">
      <h2 class="section-title">
        New Release
        <span>
          Song
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
          <a href="<?=$baseurl?>/album/<?= $album['id']?>">
            <div class="song">
              <img alt="" src="<?=$baseurl?>/public/imgs/albums/<?=$album['img']?>"/>
              <p class="title">
                <?=$album['albumName']?>
              </p>
              <p class="artist-name">
                <?=$album['name']?>
              </p>
            </div>
          </a>
        <?php }?>
        <a class="view-all" href="#">
          <div class="icon"><i class="fas fa-plus"></i></div>
          <p>View all</p>
        </a>
      </div>
    </div>

    <?php include "views/layouts/footer.php" ?>