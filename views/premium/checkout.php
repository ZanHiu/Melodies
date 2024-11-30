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
    <div class="hero">
      <!-- Sub header -->
      <?php include "views/layouts/subheader.php" ?>

      <!-- Hero content -->
      <div class="hero-content">
        <div class="intro">
         <h2>Nghe không giới hạn. Dùng thử gói Premium trong 2 tháng với giá 59.000đ</h2>
         <p>Sau đó chỉ 59.000đ/tháng. Hủy bất cứ lúc nào</p>
        </div>
        <div class="btn-wrapper">
          <a class="btn btn-primary" href="#">Mua Premium Individual</a>
          <a class="btn btn-secondary" href="#">Xem tất cả các gói</a>
        </div>
        <p>59.000đ cho 2 tháng, sau đó là 59.000đ/tháng. Chỉ áp dụng ưu đãi nếu bạn chưa từng dùng gói Premium. Có áp dụng điều khoản.</p>
      </div>
    </div>

    <!-- Section -->
    <!-- Trending -->
    <div class="section">
      <h2 class="title">Gói hợp túi tiền cho mọi hoàn cảnh</h2>
      <p class="subtitle">Chọn một gói Premium để nghe nhạc không quảng cáo thỏa thích trên điện thoại, loa và các thiết bị khác. Thanh toán theo nhiều cách. Hủy bất cứ lúc nào.</p>
      <div class="card-wrapper">
        <div class="card">
          <img src="<?=$baseurl?>/public/imgs/momo.png" alt="">
        </div>
        <div class="card">
          <img src="<?=$baseurl?>/public/imgs/visa.png" alt="">
        </div>
        <div class="card">
          <img src="<?=$baseurl?>/public/imgs/credit.png" alt="">
        </div>
        <div class="card">
          <img src="<?=$baseurl?>/public/imgs/bank.png" alt="">
        </div>
      </div>
      <div class="convenient">
        <h2>Lợi ích của tất cả các gói</h2>
        <ul>
          <li>Nghe nhạc không quảng cáo</li>
          <li>Tải xuống để nghe offline</li>
          <li>Phát nhạc theo thứ tự bất kì</li>
          <li>Chất lượng âm thanh cao</li>
          <li>Nghe cùng bạn bè theo thời gian thực</li>
          <li>Sắp xếp danh sách nhạc chờ nghe</li>
        </ul>
      </div>
      <div class="packets">
        <div class="packet">
          <h2 class="mini">Mini</h2>
          <p>Free</p>
          <hr>
          <p>1 tài khoản premium chỉ dành cho 1 thiết bị di động</p>
          <p>Nghe tối đa 30 bài hát trên 1 thiết bị không có kết nối mạng</p>
          <p>Thanh toán chỉ 1 lần</p>
          <p>Chất lượng âm thanh cơ bản</p>
          <a class="btn btn-primary" href="#">Free</a>
          <p class="small">Không cần áp dụng điều khoản</p>
        </div>
        <div class="packet">
          <h2 class="individual">Individual</h2>
          <p>59.000đ/2 tháng đầu</p>
          <hr>
          <p>1 tài khoản premium sử dụng trên nhiều thiết bị</p>
          <p>Hủy bất cứ lúc nào</p>
          <p>Đăng kí hoặc thanh toán 1 lần</p>
          <p>59.000đ/2 tháng đầu sử dụng</p>
          <a class="btn btn-secondary" href="#">59.000đ</a>
          <p class="small">Có áp dụng điều khoản</p>
        </div>
      </div>
      <div class="different">
        <h2>Trải nghiệm sự khác biệt</h2>
        <p>Dùng Premium để nắm toàn quyền kiểm soát trải nghiệm nghe nhạc. Hủy bất cứ lúc nào</p>
        <table>
          <tr>
            <td>Lợi ích dành cho bạn</td>
            <td>Gói Mini</td>
            <td>Gói Individual</td>
          </tr>
          <tr>
            <td>Nghe nhạc không quảng cáo</td>
            <td>✗</td>
            <td>✓</td>
          </tr>
          <tr>
            <td>Nghe nhạc không quảng cáo</td>
            <td>✗</td>
            <td>✓</td>
          </tr>
          <tr>
            <td>Nghe nhạc không quảng cáo</td>
            <td>✗</td>
            <td>✓</td>
          </tr>
          <tr>
            <td>Nghe nhạc không quảng cáo</td>
            <td>✗</td>
            <td>✓</td>
          </tr>
        </table>
      </div>
    </div>

    <?php include "views/layouts/footer.php" ?>