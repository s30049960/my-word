<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library_sever"; // 修改為你的資料庫名稱

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 假設訂單相關的資訊存放在名為 `orders` 的資料表中
	$sql = "INSERT INTO orders (userid, orderid, bookid, price, order_time) VALUES (?, ?, ?, ?, NOW())";
	$stmt = $conn->prepare($sql);

	// 補充：確認 $_SESSION["userid"] 是否存在
	if(isset($_SESSION["userid"])) {
		$user_id = $_SESSION["userid"]; // 假設已經在登入時存儲了用戶ID

	    // 插入訂單前獲取 order_id
	    $stmt->bind_param("siid", $user_id, $order_id, $bookid, $price); // 修正此行的參數
	    $stmt->execute();
	    $order_id = $conn->insert_id;

	    $bookid = 1; // 這裡是假設的 bookid，你需要根據實際情況設定
	    $price = 100; // 這裡是假設的 price，你需要根據實際情況設定

	    // 現在你可以使用 $order_id, $bookid, $price 插入 order_details 表

	    echo "訂單已送出！";

	    // 清空購物車
	    unset($_SESSION['cart']);
	} else {
		echo "未找到用戶ID。";
	}
}

$conn->close();
?>