<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Melodies</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet" />
  <link href="<?=$baseurl?>/public/css/music.css" rel="stylesheet" />
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
        <div class="left-side-play">
          <div class="circle">
            <div class="roller song-img">
              <!-- <span id="roller"></span>
              <span id="roller"></span>
              <span id="roller"></span>
              <span id="roller"></span> -->
              <img src="<?=$baseurl?>/public/imgs/songs/<?=$song['img']?>" alt="" id="image_">
            </div>
          </div>
        </div>
        <!-- <br><br> -->
        <div class="right-side-play">
          <div class="song-info-play">
            <div class="name">
              <div class="song_name">
                  <?=$song['songName']?>
              </div>
              <p class="artist"><?=$song['name']?></p>
            </div>
            <a href="<?=$baseurl?>/addfavorite/<?=$song['id']?>"><i class="fas fa-heart"></i></a>
          </div>
          <div class="strtime">
              <div class="start_str" id="start">
                  0:00
              </div>
              <div class="end_str" id="end">
                  0:00
              </div>
          </div>

          <div class="pro" id="pro">
              <div class="bar" id="bar"></div>
          </div>
          
          <br>

          <div class="control">
              <button class="back" id="back">
                  <i class="fas fa-backward" id="bw_id"></i>
              </button>
              <button class="play" id="play">
                  <i class="fas fa-play" id="pl_id"></i>
              </button>
              <button class="next" id="next">
                  <i class="fas fa-forward" id="fw_id"></i>
              </button>
          </div>

          <div id="popup" class="popup">
              <i class="fas fa-chevron-down" onclick="close_popup()"></i>
              <div class="list">
                  <div class="popup-container">
                      <p></p>
                  </div>
              </div>
          </div>

          <!-- <div class="patanhi"></div> -->

          <audio src="<?=$baseurl?>/public/musics/<?=$song['path']?>"></audio>
        </div>
      </div>
    </div>

    <!-- Section -->
    <!-- Trending -->
    <div class="container">
      <div class="left-col">
        <div class="section">
          <table class="song-list">
            <tr class="song-list-header">
              <td></td>
              <td colspan="3"><?=count($comments)?> comments</td>
            </tr>
            <?php foreach ($comments as $index => $comments) {?>
              <tr class="song-item">
                <td class="song-index">
                  <?=$index+1?>
                </td>
                <td class="song-infor">
                  <img alt="" height="60" class="user-img"
                    src="<?=$baseurl?>/public/imgs/artists/<?=$comments['img']?>"
                    width="60" />
                  <div class="song-name"><?=$comments['name']?><div class="song-artist"><?=$comments['content']?></div>
                  </div>
                </td>
                <td><?=$comments['created']?></td>
                <td>
                  <i class="fas fa-heart"></i>
                </td>
              </tr>
            <?php } ?>
          </table>
        </div>
      </div>
      <div class="right-col">
        <div class="section">
          <table class="song-list">
            <tr class="song-list-header">
              <td>In Album</td>
            </tr>
            <tr class="song-item">
              <td class="song-infor">
                <img alt="" height="60"
                  src="<?=$baseurl?>/public/imgs/albums/<?=$song['albumImg']?>"
                  width="60" />
                <div class="song-name"><?= $song['albumName'] ?><div class="song-artist"><?= $song['name'] ?></div>
                </div>
              </td>
              <td>
                <i class="fas fa-heart"></i>
              </td>
            </tr>
            <tr class="song-list-header">
              <td>Related Songs</td>
            </tr>
            <?php foreach ($songs as $song) { ?>
              <tr class="song-item">
                <td class="song-infor">
                  <img alt="" height="60"
                    src="<?=$baseurl?>/public/imgs/songs/<?=$song['img']?>"
                    width="60" />
                  <div class="song-name"><?= $song['songName'] ?><div class="song-artist"><?= $song['name'] ?></div>
                  </div>
                </td>
                <td>
                  <i class="fas fa-heart"></i>
                </td>
              </tr>
            <?php } ?>
          </table>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <div class="footer">
      <div class="about">
        <h2>About</h2>
        <p>
          Melodies is a website that has been created for over <span class="hl-primary">5 year's</span> now and it is
          one of the most famous music player website's in the world. in this website you can listen and download songs
          for free. also of you want no limitation you can buy our <a href="#" class="hl-secondary">premium pass's</a>.
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
  <!-- <script src="<?=$baseurl?>/public/js/music-player.js"></script> -->
   <script>
    const audio = document.querySelector("audio");
    const roll = document.getElementById("roller");
    const play = document.getElementById("play");
    const pl = document.getElementById("pl_id");
    const pro = document.getElementById("pro");
    const bar = document.getElementById("bar");
    const shift = document.getElementById("shift");
    const next = document.getElementById("next");
    const back = document.getElementById("back");
    const popup_container = document.querySelector(".popup-container")

    const bar_width = pro.clientWidth;
    var popup_cont = document.querySelector(".popup");

    function pop() {
      popup_cont.classList.toggle("popup-flex");
      document.querySelector(".fa-chevron-down").style.cursor = "pointer";
    }

    function close_popup() {
      popup_cont.classList.remove("popup-flex");
    }

    audio.ontimeupdate = function () { update() };

    const array_yaar = <?php echo json_encode($songs); ?>;
    let currentSongId = 1;
    // console.log(array_yaar);
    text = "";

    for (let i = 0; i < array_yaar.length; i++) {
      text += "<p class='f" + i + "'>" + array_yaar[i].name + "</p>";
      document.querySelector(".popup-container").innerHTML = text;
      const x = ".popup-container .f" + i;
      const v = document.querySelector(x);
    }

    const nextSong = () => {
        const nextSong = array_yaar.find(song => song.id === currentSongId + 1);
        if (nextSong) {
            currentSongId = nextSong.id;
            audio.src = '<?= $baseurl ?>/public/musics/' + nextSong.path;
            document.querySelector(".song_name").innerHTML = nextSong.songName;
            document.querySelector(".artist").innerHTML = nextSong.name;
            document.getElementById("image_").src = '<?= $baseurl ?>/public/imgs/songs/' + nextSong.img;
            audio.play();
            document.getElementById("pl_id").classList.replace("fa-play", "fa-pause");
        } else {
            console.log("No next song available");
        }
    };

    const prevSong = () => {
        const prevSong = array_yaar.find(song => song.id === currentSongId - 1);
        if (prevSong) {
            currentSongId = prevSong.id;
            audio.src = '<?= $baseurl ?>/public/musics/' + prevSong.path;
            document.querySelector(".song_name").innerHTML = prevSong.songName;
            document.querySelector(".artist").innerHTML = prevSong.name;
            document.getElementById("image_").src = '<?= $baseurl ?>/public/imgs/songs/' + prevSong.img;
            audio.play();
            document.getElementById("pl_id").classList.replace("fa-play", "fa-pause");
        } else {
            console.log("No previous song available");
        }
    };

    next.addEventListener('click', nextSong);
    back.addEventListener('click', prevSong);

    let isplay = false;

    const playaud = () => {
      isplay = true;
      audio.play();
    }
    const pauseaud = () => {
      isplay = false;
      audio.pause();
    }

    play.addEventListener('click', () => {
      if (isplay) {
        pauseaud();
        pl.classList.replace("fa-pause", "fa-play");
        roll.style.animationPlayState = 'paused';
      } else {
        playaud();
        pl.classList.replace("fa-play", "fa-pause");
        roll.classList.add('anime');
        roll.style.animationPlayState = 'running';
      }
    })

    function update() {
      let player = audio.currentTime;
      // console.log(dur);

      let dur = audio.duration;
      const dur_min = dur / 60;
      // console.log(dur_min);
      const dur_sec = dur % 60;
      // console.log(dur_sec);
      const t_min = player / 60;
      const t_sec = player % 60;

      const per_sec = (player / dur) * 100;
      bar.style.width = per_sec + "%";

      pro.addEventListener('click', (event) => {
        // console.log(event);
        // console.log(pro.clientWidth);
        const tota = event.offsetX;
        // console.log(tota);
        const move = (tota / pro.clientWidth) * 100;
        bar.style.width = move + "%";
        audio.currentTime = (move / 100) * dur;
      })



      if (audio.duration === audio.currentTime) {
        // console.log("hey");
        nextSong();
      }

      if (t_min < 1) {
        if (t_sec < 10) {
          document.getElementById("start").innerHTML = '0'.concat(':', '0', Math.floor(t_sec));
        } else {
          document.getElementById("start").innerHTML = '0'.concat(':', Math.floor(t_sec));
        }
      } else {
        if (t_sec < 10) {
          document.getElementById("start").innerHTML = Math.floor(t_min) + ':0' + Math.floor(t_sec);
        } else {
          document.getElementById("start").innerHTML = Math.floor(t_min) + ':' + Math.floor(t_sec);
        }
      }
      if (dur_min < 1) {
        if (dur_sec < 10) {
          document.getElementById("end").innerHTML = '0'.concat(':', '0', Math.floor(dur_sec));
        } else {
          document.getElementById("end").innerHTML = '0'.concat(':', Math.floor(dur_sec));
        }
      } else {
        if (dur_min == 0) {
          if (dur_sec < 10) {
            document.getElementById("end").innerHTML = '0'.concat(':', '0', Math.floor(dur_sec));
          } else {
            document.getElementById("end").innerHTML = '0'.concat(':', Math.floor(dur_sec));
          }
        } else {
          if (dur_sec < 10) {
            document.getElementById("end").innerHTML = Math.floor(dur_min) + ':0' + Math.floor(dur_sec);
          } else {
            document.getElementById("end").innerHTML = Math.floor(dur_min) + ':' + Math.floor(dur_sec);
          }
        }
      }
    }
   </script>
</body>

</html>