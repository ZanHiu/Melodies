<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Melodies</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet" />
  <link href="<?=$baseurl?>/public/css/sub.css" rel="stylesheet" />
  <link href="<?=$baseurl?>/public/css/global.css" rel="stylesheet" />
</head>
<body>
  <!-- Sidebar -->
  <?php include "views/layouts/sidebar.php" ?>

  <!-- Sub content -->
  <div class="sub-content">
    <div class="hero">
      <!-- Sub header -->
      <?php include "views/layouts/subheader.php" ?>

      <!-- Hero content -->
      <div class="hero-content">
        <img src="<?=$baseurl?>/public/imgs/albums/<?=$album['img']?>" alt="">
        <div class="album-info">
          <h1 class="album-title"><?=$album['albumName']?> <span></span></h1>
          <p class="album-desc">
            <!-- <?=$album['description']?> -->
          </p>
          <div class="quantity">
            <p>20 songs</p>
            <p class="dot">·</p>
            <p>1h 36m</p>
          </div>
        </div>
        <div class="play-all">
          <a href="#">
            <p>Play All</p>
            <i class="fas fa-play-circle"></i>
          </a>
        </div>
      </div>
    </div>

    <!-- Section -->
    <!-- Trending -->
    <div class="section">
      <table class="song-list">
        <tr class="song-list-header">
          <td></td>
          <td></td>
          <td>Release Date</td>
          <td>Album</td>
          <td></td>
          <td style="text-align: center;">Time</td>
        </tr>
        <?php foreach ($songs as $index => $song) {?>
          <tr class="song-item">
            <td class="song-index">
              <?=$index+1?>
            </td>
            <td class="song-infor">
              <img alt="" height="60"
                src="<?=$baseurl?>/public/imgs/songs/<?=$song['img']?>"
                width="60" />
                <div class="song-name">
                  <a href="<?=$baseurl?>/song/<?=$song['id']?>"><?=$song['songName']?></a>
                  <div class="song-artist">
                    <a href="artist.html"><?=$song['name']?></a>
                  </div>
                </div>
            </td>
            <td><?=$song['created']?></td>
            <td><?=$song['albumName']?></td>
            <td>
              <i class="fas fa-heart"></i>
            </td>
            <td class="song-time">3:26</td>
          </tr>
        <?php } ?>
      </table>
    </div>

    <?php include "views/layouts/footer.php" ?>