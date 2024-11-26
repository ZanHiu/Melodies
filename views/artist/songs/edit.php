<?php include "views/layouts/header-artist.php"?>
<!-- edit.php -->
<h3>Sửa bài hát</h3>
<form action="<?= $baseurl?>/updatesong/<?= $song['id'] ?? "" ?>" method="post" enctype="multipart/form-data">
<input type="text" name="songName" placeholder="songName" value="<?= $song['songName'] ?? "" ?>"> <br>
    <input type="text" name="path" placeholder="path" value="<?= $song['path'] ?? "" ?>"> <br>
    <input type="file" name="img" placeholder="img"> <br>
    <img src="<?= $baseurl?>/public/imgs/songs/<?= $song['img'] ?? "" ?>" alt="" width=100px> <br>
    <input type="number" name="view" placeholder="view" value="<?= $song['view'] ?? "" ?>"> <br>
    <input type="number" name="favourite" placeholder="favourite" value="<?= $song['favourite'] ?? "" ?>"> <br>
    <input type="date-time" name="created" placeholder="created" value="<?= $song['created'] ?? "" ?>"> <br>
    <select name="genre" id="">
     <?php foreach ($genres as $genre) { ?>
      <option value="<?= $genre['id'] ?>" <?= $genre == $genre['id'] ? "selected" : "" ?>>
          <?= $genre['genreName'] ?>
      </option>
     <?php } ?>
    </select> <br>
    <select name="artist" id="">
     <?php foreach ($artists as $artist) { ?>
      <option value="<?= $artist['id'] ?>" <?= $artist == $artist['id'] ? "selected" : "" ?>>
       <?= $artist['name'] ?>
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
     <input type="hidden" name="oldImg" value="<?= $song['img'] ?>">
    <button class="btn btn-warning">Sửa</button>
</form>
<?php include "views/layouts/footer-board.php"?>
