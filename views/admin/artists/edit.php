<?php include "views/layouts/header-admin.php"?>
<!-- edit.php -->
<h3>Cập nhật thông tin nghệ sĩ</h3>
  <form action="<?= $baseurl?>/updateartist/<?= $artist['id'] ?? "" ?>" method="post" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="name" value="<?= $artist['name'] ?? "" ?>"> <br>
    <input type="number" name="phone" placeholder="phone" value="<?= $artist['phone'] ?? "" ?>"> <br>
    <input type="file" name="img" placeholder="img"> <br>
    <img src="<?= $baseurl?>/public/imgs/artists/<?= $artist['img'] ?? "" ?>" alt="" width=100px> <br>
    <input type="date" name="birthday" placeholder="birthday" value="<?= $artist['birthday'] ?? "" ?>"> <br>
    <select name="user" id="">
     <?php foreach ($users as $user) { ?>
      <option value="<?= $user['id'] ?>" <?= $user == $user['id'] ? "selected" : "" ?>>
          <?= $user['name'] ?>
      </option>
     <?php } ?>
    </select> <br>
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