<?php include "views/layouts/header-artist.php"?>
<h3>Thêm album</h3>
<form action="postalbum" method="post" enctype="multipart/form-data">
    <input type="text" name="albumName" placeholder="albumName" value="<?= $albumName ?? "" ?>"> <br>
    <input type="file" name="img" placeholder="img" value="<?= $img ?? "" ?>"> <br>
    <input type="date-time" name="created" placeholder="created" value="<?= $created ?? "" ?>"> <br>
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