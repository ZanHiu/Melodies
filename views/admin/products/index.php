<?php include "views/layouts/header-admin.php"?>
<form action="searchproduct" method="post">
    <input type="text" name="search" value="<?= $_POST['search']??"" ?>"> <button>Search</button>
 </form>

<h2 class="text-center">Quản lí sản phẩm</h2>
<a class="btn btn-warning" href="<?= $baseurl?>/addproduct">Thêm sản phẩm</a>
<table class="table table-hover">
    <tr>
        <th>Id</th>
        <th>Image</th>
        <th>Title</th>
        <th>Price</th>
        <th>Sale</th>
        <th>Action</th>
    </tr>
    <?php foreach ($products as $product) { ?>
    <tr>
        <td><?= $product['id'] ?></td>
        <td><img src="<?= $baseurl?>/public/images/<?= $product['image'] ?>" alt="" style="width: 200px; height: 200px"></td>
        <td><?= $product['title'] ?></td>
        <td><?= $product['price'] ?></td>
        <td><?= $product['sale'] ?></td>
        <td><a href="<?= $baseurl?>/editproduct/<?= $product['id'] ?>" class="btn btn-primary">Edit</a> | <a href="<?= $baseurl?>/deleteproduct/<?= $product['id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa?')" class="btn btn-danger">Delete</a></td>        
    </tr>
    <?php } ?>  
</table>
<?php include "views/layouts/footer-admin.php"?>
