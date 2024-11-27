<?php include "views/layouts/header-admin.php"?>
<form action="searchgenre" method="post">
    <input type="text" name="search" value="<?= $_POST['search'] ?? "" ?>"> 
    <button>Search</button>
</form>

<h2 class="text-center">Quản lí thể loại</h2>
<a class="btn btn-warning" href="<?=$baseurl ?>/addgenre">Thêm thể loại</a> <br>
<table class="table table-hover">
    <tr>
        <th>Id</th>
        <th>Genre Name</th>
        <th>Image</th>
        <th>Action</th>
    </tr>
    <?php foreach ($genres as $genre) {?>
        <tr>
            <td><?php echo $genre['id']?></td>
            <td><?php echo $genre['genreName']?></td>
            <td><img src="<?= $baseurl?>/public/imgs/genres/<?= $genre['img'] ?>" alt="" style="width: 100px; height: 100px"></td>
            <td>
                <a href="<?=$baseurl?>/editgenre/<?=$genre['id']?>" class="btn btn-primary">Edit</a>
                <a href="<?=$baseurl?>/deletegenre/<?=$genre['id']?>" onclick="return confirm('Bạn có thực sự muốn xóa?')" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    <?php }?>
</table>
<?php include "views/layouts/footer-board.php"?>