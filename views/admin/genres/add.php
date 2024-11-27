<?php include "views/layouts/header-admin.php"?>
<h3>Thêm nghệ sĩ</h3>
<form action="postgenre" method="post" enctype="multipart/form-data">
    <input type="text" name="genreName" placeholder="genreName" value="<?= $genreName ?? "" ?>"> <br>
    <input type="file" name="img" placeholder="img" value="<?= $img ?? "" ?>"> <br>
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