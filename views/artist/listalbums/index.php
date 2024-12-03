<?php include "views/layouts/header-artist.php"?>
<form action="searchlistalbum" method="post">
    <input type="text" name="search" value="<?= $_POST['search'] ?? "" ?>"> 
    <button>Search</button>
</form>

<h2 class="text-center">Album Manager</h2>
<a class="btn btn-warning" href="<?=$baseurl ?>/addlistalbum">Thêm album</a> <br>
<table class="table table-hover">
    <tr>
        <th>Id</th>
        <th>Album Name</th>
        <th>Song Name</th>
        <th>Action</th>
    </tr>
    <?php foreach ($listalbums as $listalbum) {?>
        <tr>
            <td><?php echo $listalbum['id']?></td>
            <td><?php echo $listalbum['albumName']?></td>
            <td><?php echo $listalbum['songName']?></td>
            <td>
                <a href="<?=$baseurl?>/editlistalbum/<?=$listalbum['id']?>" class="btn btn-primary">Edit</a>
                <a href="<?=$baseurl?>/deletelistalbum/<?=$listalbum['id']?>" onclick="return confirm('Bạn có thực sự muốn xóa?')" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    <?php }?>
</table>
<?php include "views/layouts/footer-board.php"?>