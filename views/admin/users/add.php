<?php include "views/layouts/header-admin.php"?>
<h3>Thêm người dùng</h3>
<form action="postuser" method="post" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="name" value="<?= $name ?? "" ?>"> <br>
    <input type="text" name="password" placeholder="password" value="<?= $password ?? "" ?>"> <br>
    <input type="email" name="email" placeholder="email" value="<?= $email ?? "" ?>"> <br>
    <input type="number" name="phone" placeholder="phone" value="<?= $phone ?? "" ?>"> <br>
    <input type="file" name="img" placeholder="img" value="<?= $img ?? "" ?>"> <br>
    <input type="date-time" name="birthday" placeholder="birthday" value="<?= $birthday ?? "" ?>"> <br>
    <input type="text" name="role" placeholder="role" value="<?= $role ?? "" ?>"> <br>
    <select name="sub" id="">
     <?php foreach ($subs as $sub) { ?>
      <option value="<?= $sub['id'] ?>" <?= $sub == $sub['id'] ? "selected" : "" ?>>
          <?= $sub['type'] ?>
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
    <button class="btn btn-warning">Add</button>
</form>
<?php include "views/layouts/footer-board.php"?>