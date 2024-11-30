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
      <?php include "views/layouts/header.php" ?>

      <!-- New Release Songs -->
       <div class="section">
        <h2 class="section-title">
          All
          <span>
            Albums
          </span>
        </h2>
        <div class="songs">
          <?php foreach ($albums as $album) {?>
            <div class="song">
              <img alt="" src="<?=$baseurl?>/public/imgs/albums/<?=$album['img']?>"/>
              <a href="<?=$baseurl?>/album/<?= $album['id']?>">
                <p class="title">
                  <?=$album['albumName']?>
                </p>
              </a>
              <p class="artist-name">
                <?=$album['name']?>
              </p>
            </div>
          <?php }?>
          <!-- <a class="view-all" href="#">
            <div class="icon"><i class="fas fa-plus"></i></div>
            <p>View all</p>
          </a> -->
        </div>
     </div>
    </div>

    <!-- Footer -->
    <div class="footer">
      <div class="about">
        <h2>About</h2>
        <p>
          Melodies is a website that has been created for over <span class="hl-primary">5 year's</span> now and it is one of the most famous music player website's in the world. in this website you can listen and download songs for free. also of you want no limitation you can buy our <a href="#" class="hl-secondary">premium pass's</a>.
        </p>
      </div>
      <div class="footer-menu">
        <div class="footer-menu-col">
          <h3>Melodies</h3>
          <ul>
              <li>Songs</li>
              <li>Radio</li>
              <li>Podcast</li>
          </ul>
        </div>
        <div class="footer-menu-col">
          <h3>Access</h3>
          <ul>
              <li>Explor</li>
              <li>Artists</li>
              <li>Playlists</li>
              <li>Albums</li>
              <li>Trending</li>
          </ul>
        </div>
        <div class="footer-menu-col">
          <h3>Contact</h3>
          <ul>
            <li>About</li>
            <li>Policy</li>
            <li>Social Media</li>
            <li>Support</li>
          </ul>
        </div>
      </div>
      <div class="social-media">
        <h1>Melodies</h1>
        <div class="social-media-icons">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fas fa-phone-alt"></i></a>
        </div>
      </div>
    </div>
  </div>
  <script src="<?=$baseurl?>/public/js/tab.js"></script>
</body>
</html>