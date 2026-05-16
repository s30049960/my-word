<meta charset=utf-8>
<html>


<style >
	header{
		background-color:#EBEBEB;
		
		margin-top:0px;
		height:70px;
		}
	.booklogo {
		float:left;
		}	
	body{
		background-color:#D6CFC4;
		display: flex;
		align-content: center;  
		justify-content: center;  
		flex-wrap: wrap;
	}
	.surface{
		
		background-color:#EBEBEB;
		border:1px black solid;
		box-sizing:border-box;
		border-radius:50px; 
		padding: 30px;
		display:inline-block;
		
		
		
	}
</style>
<header>
	
		<div class="booklogo"><a href=Index.php><img src="img/logo.png" width="120px" ></a></div>
		<?php

			session_start();
			
			echo "<p align=right>";
			echo "<a href=view_cart.php><button>查看購物車</button></a>";
			if(isset($_SESSION["sessionusername"])){
				echo "歡迎<font color=blue>".$_SESSION["sessionusername"]."</font>您好<a href=Logout.php><img width=40 heigh=30 src=img/1.png></a>";
			}else{
				
				echo "<a href=login.php><button>登入</button></a>";
			}
			echo "</p>";
		?>
	
</header>
<body>
<?php
// 建立資料庫連線
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library_sever";

$conn = new mysqli($servername, $username, $password, $dbname);

// 檢查連線是否成功
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 處理使用者輸入
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userid = $_POST["userid"];
    $userpassword = $_POST["userpassword"];
    $usermail = $_POST["usermail"];
    $sex = $_POST["sex"];

    // 防止 SQL 注入攻擊，可以使用 prepared statements
    $stmt = $conn->prepare("INSERT INTO user (userid, userpassword, email, gender) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $userid, $userpassword, $usermail, $sex);

    // 執行 SQL 語句
    if ($stmt->execute()) {
        echo "<center><h1>註冊成功！</h1></center>";
		echo "<center><a href=Index.php>回首頁</a></center>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // 關閉 prepared statement
    $stmt->close();
}

// 關閉資料庫連線
$conn->close();
?>
</body>
</html>
