<?php include "views/layouts/header-admin.php"?>
<h3>Thêm nghệ sĩ</h3>
<form action="postartist" method="post" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="name" value="<?= $name ?? "" ?>"> <br>
    <input type="number" name="phone" placeholder="phone" value="<?= $phone ?? "" ?>"> <br>
    <input type="file" name="img" placeholder="img" value="<?= $img ?? "" ?>"> <br>
    <input type="date-time" name="birthday" placeholder="birthday" value="<?= $birthday ?? "" ?>"> <br>
    <select name="user" id="">
     <?php foreach ($users as $user) { ?>
      <option value="<?= $user['id'] ?>" <?= $user == $user['id'] ? "selected" : "" ?>>
          <?= $user['name'] ?>
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