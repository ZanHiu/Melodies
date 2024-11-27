<?php include "views/layouts/header-admin.php"?>
<!-- edit.php -->
<h3>Cập nhật thông tin người dùng</h3>
  <form action="<?= $baseurl?>/updateuser/<?= $user['id'] ?? "" ?>" method="post" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="name" value="<?= $user['name'] ?? "" ?>"> <br>
    <input type="text" name="password" placeholder="password" value="<?= $user['password'] ?? "" ?>"> <br>
    <input type="email" name="email" placeholder="email" value="<?= $user['email'] ?? "" ?>"> <br>
    <input type="number" name="phone" placeholder="phone" value="<?= $user['phone'] ?? "" ?>"> <br>
    <input type="file" name="img" placeholder="img"> <br>
    <img src="<?= $baseurl?>/public/imgs/artists/<?= $user['img'] ?? "" ?>" alt="" width=100px> <br>
    <input type="date" name="birthday" placeholder="birthday" value="<?= $user['birthday'] ?? "" ?>"> <br>
    <input type="text" name="role" placeholder="role" value="<?= $user['role'] ?? "" ?>"> <br>
    <select name="sub" id="">
     <?php foreach ($subs as $sub) { ?>
      <option value="<?= $sub['id'] ?>" <?= $sub == $sub['id'] ? "selected" : "" ?>>
          <?= $sub['type'] ?>
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