<?php include "views/layouts/header-artist.php"?>
<!-- edit.php -->
<h3>Sửa list album</h3>
<form action="<?= $baseurl?>/updatelistalbum/<?= $listalbum['id'] ?? "" ?>" method="post" enctype="multipart/form-data">
    <select name="song" id="">
     <?php foreach ($songs as $song) { ?>
      <option value="<?= $song['id'] ?>" <?= $song == $song['id'] ? "selected" : "" ?>>
       <?= $song['songName'] ?>
      </option>
     <?php } ?>
    </select> <br>
    <select name="album" id="">
     <?php foreach ($albums as $album) { ?>
      <option value="<?= $album['id'] ?>" <?= $album == $album['id'] ? "selected" : "" ?>>
       <?= $album['albumName'] ?>
      </option>
     <?php } ?>
    </select> <br>

    <?php
    if(isset($errors)):
        echo "<ul style='color:red'>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    endif
    ?>
     <input type="hidden" name="oldImg" value="<?= $album['img'] ?>">
    <button class="btn btn-warning">Sửa</button>
</form>
<?php include "views/layouts/footer-board.php"?>