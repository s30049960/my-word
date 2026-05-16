<meta charset=utf-8>
<?php
$myid = $_REQUEST["userid"];?>
<?php
// 資料庫連接設定
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library_sever";

// 接收來自 HTML 表單的數據
$userid = $_POST['userid'];
$userpassword = $_POST['userpassword'];

try {
    // 創建連接
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // 設置 PDO 錯誤模式為異常
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 執行 SQL 查詢
    $sql = "SELECT * FROM user WHERE userid = ? AND userpassword = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$userid, $userpassword]);

    // 檢查用戶是否存在
    if ($stmt->rowCount() > 0) {
        echo "登入成功！";
		session_start();
		$_SESSION["sessionusername"]=$myid;
		header("Location:index.php");
        // 在這裡可以執行其他登入成功後的操作，例如導向到其他頁面
    } else {
        echo "登入失敗，帳號或密碼不正確。";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// 關閉連接
$conn = null;

?>
<a href=index.php>首頁</a>