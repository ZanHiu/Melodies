<div class="sidebar">
    <h1>Melodies</h1>
    <ul>
      <li class="menu-tab">Menu</li>
      <li>
        <a class="<?php if($actived==''){echo 'active';} ?>" href="<?=$baseurl?>">
         <i class="fas fa-home"></i>Home
        </a>
      </li>
      <li>
        <a class="<?php if($actived=='discover'){echo 'active';} ?>" href="<?=$baseurl?>/discover">
         <i class="fas fa-compass"></i>Discover
        </a>
      </li>
      <li>
        <a class="<?php if($actived=='albums'){echo 'active';} ?>" href="<?=$baseurl?>/albums">
         <i class="fas fa-music"></i>Albums
        </a>
      </li>
      <li>
        <a class="<?php if($actived=='genres'){echo 'active';} ?>" href="<?=$baseurl?>/genres">
         <i class="fas fa-layer-group"></i>Genres
        </a>
      </li>
      <li>
        <a class="<?php if($actived=='artists'){echo 'active';} ?>" href="<?=$baseurl?>/artists">
         <i class="fas fa-user"></i>Artists
        </a>
      </li>
      <li class="menu-tab">Library</li>
      <!-- <li>
        <a href="#">
         <i class="fas fa-clock"></i>Recently Added
        </a>
      </li> -->
      <li>
        <a class="<?php if($actived=='mostplayed'){echo 'active';} ?>" href="<?=$baseurl?>/mostplayed">
         <i class="fas fa-play-circle"></i>Most played
        </a>
      </li>
      <?php if(isset($_SESSION['login'])){?>
        <li class="menu-tab">Playlist and favorite</li>
        <li>
          <a class="<?php if($actived=='favorites'){echo 'active';} ?>" href="<?=$baseurl?>/favorites">
          <i class="fas fa-heart"></i>Your favorites
          </a>
        </li>
        <li>
          <a href="#">
          <i class="fas fa-list"></i>Your playlist
          </a>
        </li>
      <?php } ?>
      <!-- <li>
        <a href="#">
         <i class="fas fa-plus-circle"></i>Add playlist
        </a>
      </li> -->
      <li class="menu-tab">General</li>
      <li>
        <a href="#">
         <i class="fas fa-cog"></i>Setting
        </a>
      </li>
      <?php if(isset($_SESSION['login'])){?>
      <li>
        <a href="<?=$baseurl?>/logout">
         <i class="fas fa-sign-out-alt"></i>Logout
        </a>
      </li>
      <?php } ?>
    </ul>
  </div>