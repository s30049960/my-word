<?php
session_start();

// 清空購物車
$_SESSION['cart'] = array();

// 可以根據需要執行其他清空購物車相關的操作

// 回應成功的 JSON 資料
echo json_encode(array('status' => 'success', 'message' => '購物車已清空'));
?>
