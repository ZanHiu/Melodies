<?php include "views/layouts/header-admin.php"?>
<form action="searchuser" method="post">
    <input type="text" name="search" value="<?= $_POST['search'] ?? "" ?>"> 
    <button>Search</button>
</form>

<h2 class="text-center">Quản lí người dùng</h2>
<a class="btn btn-warning" href="<?=$baseurl ?>/adduser">Thêm người dùng</a> <br>
<table class="table table-hover">
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Password</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Role</th>
        <th>Action</th>
    </tr>
    <?php foreach ($users as $user) {?>
        <tr>
            <td><?php echo $user['id']?></td>
            <td><?php echo $user['username']?></td>
            <td><i>Mật khẩu đã mã hóa</i></td>
            <td><?php echo $user['email']?></td>
            <td><?php echo $user['phone']?></td>
            <td><?php echo $user['role_id']?></td>
            <td>
                <a href="<?=$baseurl?>/edituser/<?=$user['id']?>" class="btn btn-primary">Edit</a>
                <a href="<?=$baseurl?>/deleteuser/<?=$user['id']?>" onclick="return confirm('Bạn có thực sự muốn xóa?')" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    <?php }?>
</table>
<?php include "views/layouts/footer-admin.php"?>