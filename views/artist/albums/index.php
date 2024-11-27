<?php include "views/layouts/header-artist.php"?>
<form action="searchalbum" method="post">
    <input type="text" name="search" value="<?= $_POST['search'] ?? "" ?>"> 
    <button>Search</button>
</form>

<h2 class="text-center">Album Manager</h2>
<a class="btn btn-warning" href="<?=$baseurl ?>/addalbum">Thêm album</a> <br>
<table class="table table-hover">
    <tr>
        <th>Id</th>
        <th>Album Name</th>
        <th>Image</th>
        <th>Create At</th>
        <th>Artist</th>
        <th>Action</th>
    </tr>
    <?php foreach ($albums as $album) {?>
        <tr>
            <td><?php echo $album['id']?></td>
            <td><?php echo $album['albumName']?></td>
            <td><img src="<?= $baseurl?>/public/imgs/albums/<?= $album['img'] ?>" alt="" style="width: 100px; height: 100px"></td>
            <td><?php echo $album['created']?></td>
            <td><?php echo $album['name']?></td>
            <td>
                <a href="<?=$baseurl?>/editalbum/<?=$album['id']?>" class="btn btn-primary">Edit</a>
                <a href="<?=$baseurl?>/deletealbum/<?=$album['id']?>" onclick="return confirm('Bạn có thực sự muốn xóa?')" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    <?php }?>
</table>
<?php include "views/layouts/footer-board.php"?>