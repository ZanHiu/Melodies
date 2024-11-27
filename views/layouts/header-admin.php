<?php
if(!isset($_SESSION['login']) or $_SESSION['login']['role']!='admin' && $_SESSION['login']['role']!='artist'){
  $_SESSION['redirectto'] = $_SERVER['REQUEST_URI'];
  header("Location: $baseurl/login");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Quản trị website</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<h2 class="p-3 m-0 bg-primary-subtle">ADMIN BOARD</h2>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= $baseurl ?>">MELODIES</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
      <li class="nav-item">
          <a class="nav-link" href="<?= $baseurl ?>/adminboard">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= $baseurl ?>/usermanager">Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= $baseurl ?>/artistmanager">Artists</a>
        </li>
      </ul>
      <form action="<?=$baseurl?>/logout" method="POST" class="d-flex" style="color: white">
        <?php if(isset($_SESSION['login'])){?>
            Chào <?php echo $_SESSION['login']['name'] ?> |
           <button type="submit">Đăng xuất</button>
        <?php }?>
      </form>
    </div>
  </div>
</nav>

<div class="container-fluid mt-3">