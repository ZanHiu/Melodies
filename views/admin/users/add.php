<?php include "views/layouts/header-admin.php"?>
<h3>Thêm người dùng</h3>
<form action="postuser" method="post" enctype="multipart/form-data">
    <input type="text" name="username" placeholder="username" value="<?= $username ?? "" ?>"> <br>
    <input type="text" name="password" placeholder="password" value="<?= $password ?? "" ?>"> <br>
    <input type="email" name="email" placeholder="email" value="<?= $email ?? "" ?>"> <br>
    <input type="number" name="phone" placeholder="phone" value="<?= $phone ?? "" ?>"> <br>
    <input type="number" name="role_id" placeholder="role_id" value="<?= $role_id ?? "" ?>"> <br>
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
<?php include "views/layouts/footer-admin.php"?>