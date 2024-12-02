<?php
  use views\mail\PHPMailer\src\PHPMailer;
  use views\mail\PHPMailer\src\Exception;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Melodies</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet" />
  <link href="<?=$baseurl?>/public/css/contact.css" rel="stylesheet" />
  <link href="<?=$baseurl?>/public/css/global.css" rel="stylesheet" />
  <style>
    h2{
        text-align:center;
    }
    .title {
        width: 100%;
        display: flex;
        justify-content: center;
    }
    h1{
        text-align: center;
        background: linear-gradient(to right, #EE10B0, #0E9EEF);
        /* width: 200px; */
        -webkit-background-clip: text;
        color: transparent;
        font-size: 32px;
        margin-bottom: 24px;
        margin-top: 0
    }
    h3{
        font-size:30px;
    }

    .email-container {
  width: 50%;
  margin: 50px auto;
  padding: 20px;
  background: #ffffff;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
}

h1 {
  text-align: center;
  color: #333;
}

label {
  font-weight: bold;
  margin-top: 15px;
  display: block;
  color: #555;
}

input, textarea, button {
  width: 100%;
  padding: 10px;
  margin-top: 5px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-sizing: border-box;
}

textarea {
  resize: none;
}

button {
  background-color: #007bff;
  color: #fff;
  border: none;
  cursor: pointer;
}

button:hover {
  background-color: #0056b3;
}

.button-group {
  display: flex;
  justify-content: space-between;
}

button[type="reset"] {
  background-color: #dc3545;
}

button[type="reset"]:hover {
  background-color: #a71d2a;
}
   
  </style>
</head>
<body>
  
  <!-- Sidebar -->
  <?php include "views/layouts/sidebar.php" ?>
    
  <!-- Sub content -->
  <div class="sub-content">
      <!-- Sub header -->
      <?php include "views/layouts/subheader.php" ?>
    <div class="ctab">
        <h2>Contact</h2>
        <div class="title">
            <h1>Melodies</h1>
        </div>
            <h3>Giới thiệu về chúng tôi</h3>
            <p>Với Melodies, bạn có thể dễ dàng tìm nhạc hoặc podcast thích hợp cho từng khoảnh khắc – trên điện thoại, máy tính, máy tính bảng và các thiết bị khác.</p>
            <p>Có hàng triệu bản nhạc và tập nội dung trên Melodies. Vì vậy, dù đang lái xe, tập thể dục, dự tiệc hay thư giãn, bạn luôn có thể dễ dàng chọn được nhạc hoặc podcast phù hợp. Chọn nội dung bạn muốn nghe hoặc tận hưởng điều ngạc nhiên từ Melodies.</p>
            <p>Bạn cũng có thể duyệt xem các bộ sưu tập của bạn bè, nghệ sĩ và người nổi tiếng hoặc tạo đài phát radio và cứ thế thưởng thức.</p>
            <p>Hãy để cuộc sống của bạn tràn ngập tiếng nhạc với Melodies. Bạn có thể đăng ký hoặc nghe miễn phí.</p>
            <h3>Dịch vụ Khách hàng và Hỗ trợ</h3>
            <p>Trang trợ giúp. Hãy truy cập vào trang trợ giúp của chúng tôi để tìm câu trả lời cho các thắc mắc của bạn và tìm hiểu cách khai thác tối đa Melodies cũng như âm nhạc của bạn.</p>
            <p>Cộng đồng. Nhận hỗ trợ nhanh chóng từ những người dùng Melodies chuyên nghiệp. Nếu chưa có câu trả lời cho câu hỏi của bạn, hãy đăng lên và sẽ có người nhanh chóng trả lời bạn. Bạn cũng có thể đề xuất và bình chọn cho các ý tưởng mới cho Melodies hoặc đơn giản là thảo luận về âm nhạc với các fan hâm mộ khác.</p>
            <p>Liên hệ với chúng tôi. Hãy liên hệ với bộ phận Hỗ trợ khách hàng nếu bạn không tìm thấy giải pháp trên trang hỗ trợ hoặc Cộng đồng của chúng tôi.</p>
            <h3>Hoặc chọn một chủ đề:</h3>
            <p>Bạn đang quảng cáo trên Melodies? Phần Nhà quảng cáo</p>
            <p>Bạn có câu hỏi về báo chí? Phần Báo chí</p>
            <p>Bạn muốn ứng tuyển một công việc? Phần Việc làm</p>
            <p>Melodies USA, Inc. cung cấp dịch vụ Melodies tới những người dùng tại Hoa Kỳ. Melodies AB cung cấp dịch vụ Melodies tới những người dùng ở tất cả các thị trường khác.</p>
        </div>

        <div class="email-container">
          <h1>Send Email</h1>
          <form action="<?= $baseurl ?>/sendmail" method="post" enctype="multipart/form-data">
            <label for="email">To:</label>
            <input type="email" id="email" name="email" placeholder="Enter recipient's email" required>
            
            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject" placeholder="Enter subject" required>
            
            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="8" placeholder="Write your message here"></textarea>
            
            <div class="button-group">
              <button type="submit" name="send">Send</button>
            </div>
          </form>
        </div>
      </div>
  <?php include "views/layouts/footer.php" ?>
