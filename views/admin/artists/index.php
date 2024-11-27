<?php include "views/layouts/header-admin.php"?>
<form action="searchartist" method="post">
    <input type="text" name="search" value="<?= $_POST['search'] ?? "" ?>"> 
    <button>Search</button>
</form>

<h2 class="text-center">Quản lí nghệ sĩ</h2>
<a class="btn btn-warning" href="<?=$baseurl ?>/addartist">Thêm nghệ sĩ</a> <br>
<table class="table table-hover">
    <tr>
        <th>Id</th>
        <th>Artist Name</th>
        <th>Phone</th>
        <th>Image</th>
        <th>Birthday</th>
        <th>User Name</th>
        <th>Action</th>
    </tr>
    <?php foreach ($artists as $artist) {?>
        <tr>
            <td><?php echo $artist['id']?></td>
            <td><?php echo $artist['name']?></td>
            <td><?php echo $artist['phone']?></td>
            <td><img src="<?= $baseurl?>/public/imgs/artists/<?= $artist['img'] ?>" alt="" style="width: 100px; height: 100px"></td>
            <td><?php echo $artist['birthday']?></td>
            <td><?php echo $artist['username']?></td>
            <td>
                <a href="<?=$baseurl?>/editartist/<?=$artist['id']?>" class="btn btn-primary">Edit</a>
                <a href="<?=$baseurl?>/deleteartist/<?=$artist['id']?>" onclick="return confirm('Bạn có thực sự muốn xóa?')" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    <?php }?>
</table>
<?php include "views/layouts/footer-board.php"?>