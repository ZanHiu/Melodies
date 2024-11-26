<?php include "views/layouts/header-artist.php"?>
<h3>Thêm bài hát</h3>
<form action="postsong" method="post" enctype="multipart/form-data">
    <input type="text" name="songName" placeholder="songName" value="<?= $songName ?? "" ?>"> <br>
    <input type="text" name="path" placeholder="path" value="<?= $path ?? "" ?>"> <br>
    <input type="file" name="img" placeholder="img" value="<?= $img ?? "" ?>"> <br>
    <input type="number" name="view" placeholder="view" value="<?= $view ?? "" ?>"> <br>
    <input type="number" name="favourite" placeholder="favourite" value="<?= $favourite ?? "" ?>"> <br>
    <input type="date-time" name="created" placeholder="created" value="<?= $created ?? "" ?>"> <br>
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