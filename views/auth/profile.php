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
    <!-- Sub header -->
    <?php include "views/layouts/subheader.php" ?>

    <!-- Hero content -->
    <div class="artist-hero mb-160">
      <div class="artist-content">
        <img class="avatar" src="<?=$baseurl?>/public/imgs/artists/<?=$user['img']?>" alt="">
        <div class="artist-info">
          <h1 class="artist-title"><?=$user['name']?></h1>
          <div class="artist-data">
            <div class="artist-data-item">
              <p>Followers</p>
              <p>5</p>
            </div>
            <div class="artist-data-item">
              <p>Following</p>
              <p>10</p>
            </div>
            <div class="artist-data-item">
              <p>Tracks</p>
              <p></p>
            </div>
          </div>
        </div>
        <div class="follow">
          <!-- <a class="follow-btn" href="#">
            Follow
          </a> -->
        </div>
        <div class="options">
          <a href="#" onclick="toggleMenu(event)">
            <i class="fas fa-ellipsis-h"></i>
          </a>
          <div id="action-menu" class="action-menu" style="display: none;">
            <ul>
              <li><a href="#">Edit profile</a></li>
              <?php if ($user['role'] == 'artist'): ?>
                <li><a href="<?=$baseurl?>/artistboard">Artist board</a></li>
              <?php endif; ?>
              <?php if ($user['role'] == 'admin'): ?>
                <li><a href="<?=$baseurl?>/artistboard">Artist board</a></li>
                <li><a href="<?=$baseurl?>/adminboard">Admin board</a></li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- Section -->
    <!-- Trending -->
    <div class="section">
      <h2 class="section-title mb-0">
        Recent
        <span>
          Songs
        </span>
      </h2>
      <table class="song-list">
        <tr class="song-list-header">
          <td></td>
          <td></td>
          <td>Release Date</td>
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
                  <?=$song['songName']?>
                  <div class="song-artist"><?=$song['name']?></div>
                </div>
            </td>
            <td><?=$song['created']?></td>
            <!-- <td><?=$song['genreName']?></td> -->
            <td>
              <i class="fas fa-heart"></i>
            </td>
            <td class="song-time">3:26</td>
          </tr>
        <?php }?>
      </table>
      <!-- <div class="btn-wrapper">
        <a class="view-all-btn" href="#">
          <i class="fas fa-plus"></i>
          View All
        </a>
      </div> -->
    </div>

    <!-- Popular Artists -->
    <div class="section">
      <h2 class="section-title">
        Your
        <span>
          Following
        </span>
      </h2>
      <div class="artists">
        <?php foreach ($follows as $follow) {?>
          <a href="<?=$baseurl?>/artist/<?= $follow['id']?>">
            <div class="artist">
              <img alt=""
                src="<?=$baseurl?>/public/imgs/artists/<?=$follow['img']?>"/>
              <p class="title">
                <?=$follow['name']?>
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