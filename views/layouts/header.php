<!-- Header -->
<div class="header pl-25 pr-39">
        <input placeholder="Search for Music, Artists..." type="text" />
        <nav>
          <a href="<?=$baseurl?>/about">
            About Us
          </a>
          <a href="<?=$baseurl?>/contact">
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