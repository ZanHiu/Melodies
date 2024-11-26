<?php include "views/layouts/header-admin.php"?>
<h2 class="text-center">Thống kê</h2>
<div class="container-lg text-center">
    <div class="grid gap-5">
        <div class="row g-3">
            <div class="col-6 border">
                <h4>Doanh số bán hàng</h4>
                <canvas id="salesChart" width="400" height="200"></canvas>
            </div>
            <div class="col border">
                <h4>Đơn hàng mới</h4>
                <p>100</p>
            </div>
            <div class="col border">
                <h4>Sản phẩm bán chạy</h4>
                <p>50</p>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-6 border">
                <h4>Danh sách sản phẩm</h4>
            </div>
            <div class="col border">
                <h4>Bình luận</h4>
                <p>100</p>
            </div>
            <div class="col border">
                <h4>Khách hàng mới</h4>
                <p>50</p>
            </div>
        </div>
    </div>
</div>
<script>
    // Dữ liệu mẫu cho biểu đồ
    const salesData = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June'],
        datasets: [{
            label: 'Sales',
            data: [1000, 1500, 1200, 1800, 2000, 1700],
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    };

    // Lấy thẻ canvas và vẽ biểu đồ doanh số
    const salesChartCanvas = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(salesChartCanvas, {
        type: 'line',
        data: salesData,
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<?php include "views/layouts/footer-board.php"?>