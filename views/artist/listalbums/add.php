<?php include "views/layouts/header-artist.php"?>
<h3>Thêm list album</h3>
<form action="postlistalbum" method="post" enctype="multipart/form-data">
    <select name="song" id="">
     <?php foreach ($songs as $song) { ?>
      <option value="<?= $song['id'] ?>" <?= $song == $song['id'] ? "selected" : "" ?>>
       <?= $song['songName'] ?>
      </option>
     <?php } ?>
    </select>
    <select name="album" id="">
     <?php foreach ($albums as $album) { ?>
      <option value="<?= $album['id'] ?>" <?= $album == $album['id'] ? "selected" : "" ?>>
       <?= $album['albumName'] ?>
      </option>
     <?php } ?>
    </select>

    <?php
    if(isset($errors)):
        echo "<ul style='color:red'>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    endif
    ?>
    <button class="btn btn-warning">Add</button>
</form>
<?php include "views/layouts/footer-board.php"?>