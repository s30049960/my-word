<?php
// 連接到 MySQL 資料庫
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library_sever";

$conn = new mysqli($servername, $username, $password, $dbname);

// 檢查連線是否成功
if ($conn->connect_error) {
    die("連線失敗: " . $conn->connect_error);
}
session_start();
?>
<meta charset=utf-8>

<html>
<style >
	header{
		background-color:#EBEBEB;
		
		margin-top:0px;<?php
// 連接到 MySQL 資料庫
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library_sever";

$conn = new mysqli($servername, $username, $password, $dbname);

// 檢查連線是否成功
if ($conn->connect_error) {
    die("連線失敗: " . $conn->connect_error);
}

// 開始 session
session_start();
?>
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
	}
</style>
<header>
	<div class="booklogo"><a href=Index.php><img src="img/logo.png" width="120px" ></a></div>
	<?php
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
// 查詢資料表內容
$sql = "SELECT * FROM `library_book`";
$result = $conn->query($sql);

// 顯示資料表內容於網頁上
if ($result->num_rows > 0) {
	echo "<table width=80% border=1 cellpadding=0 cellspacing=0>";
	// 輸出資料

	$count = 0; // 初始化計數器

	while ($row = $result->fetch_assoc()) {
		if ($count % 5 == 0) {
			echo "<tr>"; // 開始新的一列
		}

		echo "<td width=100><center><img src=img/" . $row["book_img"] . " width=150dp></center><br>
		<center>" . $row["book"] . "</center><br>
		<center><a href=". $row["File_name"] ."><button>了解更多</button></center></td>";
		$count++;

		if ($count % 5 == 0) {
			echo "</tr>"; // 結束一列
		}
	}

	// 如果最後一列不足五個元素，補齊空白單元格
	while ($count % 5 != 0) {
		echo "<td></td>";
		$count++;
	}

	echo "</table>";
} else {
	echo "0 筆結果";
}
?>
<br>
</body>
</html>
		height:70px;
		}
	.booklogo {
		float:left;
		}	
	body{
		background-color:#D6CFC4;
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


// 查詢資料表內容
$sql = "SELECT * FROM `library_book`";
$result = $conn->query($sql);

// 顯示資料表內容於網頁上
if ($result->num_rows > 0) {
	echo "<table width=80% border=1 cellpadding=0 cellspacing=0>";
	// 輸出資料

	$count = 0; // 初始化計數器

	while ($row = $result->fetch_assoc()) {
		if ($count % 5 == 0) {
			echo "<tr>"; // 開始新的一列
		}

		echo "<td width=100><center><img src=img/" . $row["book_img"] . " width=150dp></center><br>
		<center>" . $row["book"] . "</center><br>
		<center><a href=". $row["File_name"] ."><button>了解更多</button></center></td>";
		$count++;

		if ($count % 5 == 0) {
			echo "</tr>"; // 結束一列
		}
	}

	// 如果最後一列不足五個元素，補齊空白單元格
	while ($count % 5 != 0) {
		echo "<td></td>";
		$count++;
	}

	echo "</table>";
	
	
} else {
echo "0 筆結果";}
?>
	<br>
</body>
</html>