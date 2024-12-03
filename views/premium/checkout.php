<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Melodies</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet" />
  <link href="<?=$baseurl?>/public/css/premium.css" rel="stylesheet" />
  <link href="<?=$baseurl?>/public/css/global.css" rel="stylesheet" />
</head>
<body>
  <!-- Sidebar -->
  <?php include "views/layouts/sidebar.php" ?>

  <!-- Sub content -->
  <div class="sub-content">
    <!-- Sub header -->
    <?php include "views/layouts/subheader.php" ?>
    <div class="hero">
      <!-- Hero content -->
      <div class="hero-content" style="align-items: flex-start;">
        <div class="intro" style="text-align: left;">
         <h1>Premium Individual</h1>
         <p style="padding-left: 20px;">1 tài khoản Premium sử dụng trên nhiều thiết bị</p>
         <p style="padding-left: 20px;">Hủy bất cứ lúc nào</p>
         <p style="padding-left: 20px;">Đăng kí hoặc thanh toán 1 lần</p>
         <p style="padding-left: 20px;">59.000đ/2 tháng đầu sử dụng</p>
        </div>
        <form action="<?=$baseurl?>/charge" method="post">
          <input type="text" name="amount" value="20.00" />
          <input type="submit" name="submit" value="Pay Now">
        </form>
      </div>
    </div>

    <!-- Section -->
    <!-- Trending -->
    <div class="section">
      
    </div>

    <?php include "views/layouts/footer.php" ?>