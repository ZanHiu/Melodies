<?php include "views/layouts/header-artist.php"?>
<form action="searchsong" method="post">
    <input type="text" name="search" value="<?= $_POST['search'] ?? "" ?>"> 
    <button>Search</button>
</form>

<h2 class="text-center">Song Manager</h2>
<a class="btn btn-warning" href="<?=$baseurl ?>/addsong">Thêm bài hát</a> <br>
<table class="table table-hover">
    <tr>
        <th>Id</th>
        <th>Song Name</th>
        <th>Path</th>
        <th>Image</th>
        <th>View</th>
        <th>Favourite</th>
        <th>Create At</th>
        <th>Genre</th>
        <th>Artist</th>
        <th>Action</th>
    </tr>
    <?php foreach ($songs as $song) {?>
        <tr>
            <td><?php echo $song['id']?></td>
            <td><?php echo $song['songName']?></td>
            <td><?php echo $song['path']?></td>
            <td><img src="<?= $baseurl?>/public/imgs/songs/<?= $song['img'] ?>" alt="" style="width: 100px; height: 100px"></td>
            <td><?php echo $song['view']?></td>
            <td><?php echo $song['favourite']?></td></td>
            <td><?php echo $song['created']?></td>
            <td><?php echo $song['genreName']?></td>
            <td><?php echo $song['name']?></td>
            <td>
                <a href="<?=$baseurl?>/editsong/<?=$song['id']?>" class="btn btn-primary">Edit</a>
                <a href="<?=$baseurl?>/deletesong/<?=$song['id']?>" onclick="return confirm('Bạn có thực sự muốn xóa?')" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    <?php }?>
</table>
<?php include "views/layouts/footer-board.php"?>
