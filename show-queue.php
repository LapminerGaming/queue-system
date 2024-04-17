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
        tr:nth-child(5n+1) {
            border-bottom: 2px solid #007bff; /* Blue color */
        }
        .position {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hàng chờ</h1>
        <h3>Chờ tên của bạn qua nằm trong vạch màu xanh</h3>
        <marquee direction="left">Hàng chờ sẽ tự động cập nhật sau mỗi 15 giây. Hãy chú ý đến màn hình.</marquee>
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
    <script>
window.onload = function() {
  var audio = new Audio('level-up-191997.mp3');
  audio.play();
}

    </script>
</body>
</html>

<?php
} else {
  // Handle the case where data is not valid JSON or empty
  echo "Error: Failed to decode data from JSON file.";
}
?>
