<!DOCTYPE html>
<html>
    <head>
        <title>Admin Page</title>
        <style>
            /* admin.css */

body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 20px;
}

.container {
  max-width: 800px;
  margin: 0 auto;
}

h1 {
  text-align: center;
  margin-bottom: 20px;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
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

.delete-button {
  background-color: #dc3545;
  color: white;
  padding: 5px 10px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.delete-button:hover {
  background-color: #c82333;
}

/* Add more styles as needed for specific elements or sections */

        </style>
    </head>
    <body>
        <?php

// Define constants for security (adjust paths as needed)
define('DATA_FILE', 'data.json'); // Path to the JSON data file

// Connect to JSON file
$dataFile = DATA_FILE;
$data = json_decode(file_get_contents($dataFile), true);

// Check if data is valid
if (is_array($data)) {
    // Get current queue position (number of elements in data)
    $queuePosition = count($data);

    // Handle deletion if requested
    if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
        $deleteIndex = (int)$_GET['delete'];

        // Validate delete index
        if (isset($data[$deleteIndex])) {
            // Remove element from array
            unset($data[$deleteIndex]);
            $data = array_values($data); // Re-index array keys

            // Save updated data to JSON file
            file_put_contents($dataFile, json_encode($data, JSON_PRETTY_PRINT));

            // Success message
            echo "Xóa thành công khách hàng ở vị trí " . ($deleteIndex + 1) . "!";
        } else {
            // Invalid delete index
            echo "Vị trí xóa không hợp lệ!";
        }
    }

    // Display queue information
    echo "<h2>Thông tin hàng chờ</h2>";
    echo "Số khách hàng đang chờ: " . $queuePosition;

    // Display table with delete buttons (optional)
    if (count($data) > 0) {
        echo "<table>";
        echo "<thead><tr><th>STT</th><th>Tên khách hàng</th><th>Số điện thoại</th><th>Xóa</th></tr></thead>";
        echo "<tbody>";
        $position = 1;
        foreach ($data as $key => $customer) {
            echo "<tr>";
            echo "<td>" . $position . "</td>";
            echo "<td>" . $customer['name'] . "</td>";
            echo "<td>" . $customer['phone'] . "</td>";
            echo "<td><a href='?delete=" . $key . "'>Xóa</a></td>";
            echo "</tr>";
            $position++;
        }
        echo "</tbody></table>";
    } else {
        echo "<p>Hiện tại không có khách hàng nào trong hàng đợi.</p>";
    }
} else {
    // Handle the case where data is not valid JSON or empty
    echo "Error: Failed to decode data from JSON file.";
} ?>

</br>
    <form method="post">
        <button type="submit" name="toggle">Gọi người số 1</button>
    </form>

    <?php
    if(isset($_POST['toggle'])) {
        $file = 'audio.json';
        $data = json_decode(file_get_contents($file), true);

        // Kiểm tra nếu state là "disabled" thì chuyển sang "enabled" và ngược lại
        $data['state'] = ($data['state'] === 'disabled') ? 'enabled' : 'disabled';

        file_put_contents($file, json_encode($data));

        // Redirect hoặc in ra thông báo
        echo "Đã chỉnh sửa âm thanh: " . $data['state'];
    }
    ?>
</body>
</html>