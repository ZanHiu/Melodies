<?php include "views/layouts/header-artist.php"?>
<!-- edit.php -->
<h3>Sửa album</h3>
<form action="<?= $baseurl?>/updatealbum/<?= $album['id'] ?? "" ?>" method="post" enctype="multipart/form-data">
<input type="text" name="albumName" placeholder="albumName" value="<?= $album['albumName'] ?? "" ?>"> <br>
    <input type="file" name="img" placeholder="img"> <br>
    <img src="<?= $baseurl?>/public/imgs/albums/<?= $album['img'] ?? "" ?>" alt="" width=100px> <br>
    <input type="date-time" name="created" placeholder="created" value="<?= $album['created'] ?? "" ?>"> <br>
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
     <input type="hidden" name="oldImg" value="<?= $album['img'] ?>">
    <button class="btn btn-warning">Sửa</button>
</form>
<?php include "views/layouts/footer-board.php"?>