<?php include "views/layouts/header-admin.php"?>
<!-- edit.php -->
<h3>Cập nhật thông tin người dùng</h3>
  <form action="<?= $baseurl?>/updateuser/<?= $user['id'] ?? "" ?>" method="post" enctype="multipart/form-data">
    <input type="text" name="username" placeholder="username" value="<?= $user['username'] ?? "" ?>"> <br>
    <input type="text" name="password" placeholder="password" value="<?= $user['password'] ?? "" ?>"> <br>
    <input type="email" name="email" placeholder="email" value="<?= $user['email'] ?? "" ?>"> <br>
    <input type="number" name="phone" placeholder="phone" value="<?= $user['phone'] ?? "" ?>"> <br>
    <input type="number" name="role_id" placeholder="role_id" value="<?= $user['role_id'] ?? "" ?>"> <br>
    <?php if (isset($errors)): ?>
        <ul style="color:red">
            <?php foreach ($errors as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach ?>
        </ul>
    <?php endif ?>
    <button class="btn btn-warning">Sửa</button>
  </form>
<?php include "views/layouts/footer-admin.php"?>
