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
	.car{
		display: flex;
        flex-direction: row;
	}
	.carbook{
		display:inline-block;
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
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library_sever";

$conn = new mysqli($servername, $username, $password, $dbname);

// 檢查連接是否成功
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
<form action="submit_order.php" method="post">
    <?php
    // 顯示購物車內容
    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
        echo "<center><h2>購物車內容</h2></center>";
        foreach ($_SESSION['cart'] as $bookid => $quantity) {
            // 根據 $bookid 查詢書籍信息並顯示
            $sql = "SELECT all_book, book_img FROM `library_book` WHERE bookid = '$bookid'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $all_book = $row['all_book'];
                $book_img = $row['book_img'];
            } else {
                echo "no";
            }

            echo "<div class=car>";
            echo "<div class=carbook>";
            echo "<img src=img/{$book_img} width=100 height=75>";
            echo "</div>";
            echo "<div class=carbook>";
            echo "書籍名稱：{$all_book}<br>";
            echo "數量：{$quantity}";
            echo "<input type='hidden' name='books[$bookid]' value='$quantity'>";
            echo "</div>";
            echo "</div><hr>";
        }
    } else {
        echo "<center><h2>購物車是空的。</h2></center>";
    }
    ?>
    <center><button type="button" onclick="clearCart()">清除購物車</button></center><br>
    <center><input type="submit" value="送出訂單"></center>
</form>


<script>
function clearCart() {
    // 使用 AJAX 發送 POST 請求到伺服器端處理清空購物車的邏輯
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "clear_cart.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // 伺服器回應成功後的處理
            alert("購物車已清空");
            // 重新導向至購物車頁面，可以是 view_cart.php 或其他頁面
            window.location.href = "view_cart.php";
        }
    };

    // 傳送空的 POST 參數
    xhr.send();
}
</script>

<?php
// 關閉資料庫連接
$conn->close();

?>
</body>
</html>
