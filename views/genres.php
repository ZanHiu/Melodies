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

      <!-- Music Genres -->
      <div class="sub-hero-content ml-0">
        <h2 class="sub-hero-title">
          Music
          <span>
            Genres
          </span>
        </h2>
        <div class="music-genres has-wrap">
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

    <?php include "layouts/footer.php" ?>