<?php include "views/layouts/header-admin.php"?>
<!-- edit.php -->
<h3>Cập nhật thông tin nghệ sĩ</h3>
  <form action="<?= $baseurl?>/updategenre/<?= $genre['id'] ?? "" ?>" method="post" enctype="multipart/form-data">
    <input type="text" name="genreName" placeholder="genreName" value="<?= $genre['genreName'] ?? "" ?>"> <br>
    <input type="file" name="img" placeholder="img"> <br>
    <img src="<?= $baseurl?>/public/imgs/genres/<?= $genre['img'] ?? "" ?>" alt="" width=100px> <br>
    <?php if (isset($errors)): ?>
        <ul style="color:red">
            <?php foreach ($errors as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach ?>
        </ul>
    <?php endif ?>
    <button class="btn btn-warning">Sửa</button>
  </form>
<?php include "views/layouts/footer-board.php"?>