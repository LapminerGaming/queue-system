<?php

// Connect to JSON file
$dataFile = "data.json";
$data = json_decode(file_get_contents($dataFile), true);

// Kiểm tra xem biến $data có chứa dữ liệu không
if ($data !== null) {
    // Sort customer list by time (assuming time is key)
    usort($data, function ($a, $b) {
        return $a['time'] - $b['time'];
    });

    // Check if data is valid
    ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ thống quản lý hàng chờ</title>
    <script>
    setInterval(function(){
        location.reload();
    }, 15000);
   
</script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f0f0f0;
        }
        tr:nth-child(even) {
            background-color: #f5f5f5;
        }
        /* Style for the horizontal line after every 3rd row */
        tr:nth-child(1) {
            border-bottom: 10px solid #007bff; /* Blue color */
        }
        .position {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div style="background-color:black;color:white;">
          <?php
            // Lấy thông tin từ form
            $name = $_POST["name"];
            $phone = $_POST["phone"];

            // Tạo mảng mới cho khách hàng
            $newCustomer = [
                "name" => $name,
                "phone" => $phone,
                "time" => time()
            ];

            // Thêm khách hàng mới vào mảng data
            $data[] = $newCustomer;

            // Cập nhật tệp tin JSON
            file_put_contents($dataFile, json_encode($data, JSON_PRETTY_PRINT));

            // Thông báo thành công
            echo "Đã thêm " . $name . " vào hàng đợi";
            ?>
        </div>

        <div id="countdown">Chuyển hướng sau: 10 giây</div>
        <script>
        var seconds = 10;

        function countdown() {
            seconds--;
            document.getElementById("countdown").innerText = "Chuyển hướng sau: " + seconds + " giây";

            if (seconds <= 0) {
                clearInterval(interval);
                window.location.href = "index.php"; // Thay đổi đường dẫn đến trang mà bạn muốn chuyển hướng
            }
        }

        var interval = setInterval(countdown, 1000);
        </script>
        <h1>Hàng chờ</h1>
        <?php if (count($data) > 0) { ?>
        
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên khách hàng</th>
                    <th>Số điện thoại</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $position = 1;
                foreach ($data as $customer) {
                    echo '<tr>';
                    echo '<td><span class="position">' . $position . '</span></td>';
                    echo '<td>' . $customer['name'] . '</td>';
                    echo '<td>' . $customer['phone'] . '</td>';
                    echo '</tr>';
                    $position++;
                }
                ?>
            </tbody>
        </table>
        
        <?php } else { ?>
        
        <p>Hiện tại không có khách hàng nào trong hàng đợi.</p>
        
        <?php } ?>
    </div>

</body>
</html>

<?php
} else {
  // Handle the case where data is not valid JSON or empty
  echo "Error: Failed to decode data from JSON file.";
}
?>






  