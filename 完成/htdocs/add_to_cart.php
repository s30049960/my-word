<?php
session_start();

?>
<html>
<style>
	header {
		background-color: #EBEBEB;
		margin-top: 0px;
		height: 70px;
	}

	.booklogo {
		float: left;
	}

	body {
		background-color: #D6CFC4;
	}
</style>
<header>

	<div class="booklogo"><a href=Index.php><img src="img/logo.png" width="120px"></a></div>
	<?php

	echo "<p align=right>";
	echo "<a href=view_cart.php><button>查看購物車</button></a>";
	if (isset($_SESSION["sessionusername"])) {
		echo "歡迎<font color=blue>" . $_SESSION["sessionusername"] . "</font>您好<a href=Logout.php><img width=40 heigh=30 src=img/1.png></a>";
	} else {

		echo "<a href=login.php><button>登入</button></a>";
	}
	echo "</p>";

	?>

</header>

<?php

if (isset($_POST['bookid'])) {
	$bookid = $_POST['bookid'];

	// 檢查 $_SESSION['cart'][$bookid] 是否已經被設置
	if (!isset($_SESSION['cart'][$bookid])) {
		// 如果未被設置，則初始化為 0
		$_SESSION['cart'][$bookid] = 0;
	}

	// 將書籍添加到購物車
	$_SESSION['cart'][$bookid] += 1;

	echo "<center><h2>已將書籍添加到購物車。</h2></center><br>";
	echo "<center><input type='button' onclick='history.back()' value='回到上一頁'></input></center>";
} else {
	echo "未指定書籍。";
}
?>
</html>