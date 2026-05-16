<?php

// 資料庫連接設定
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library_sever";

try {
    // 創建連接
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // 設置 PDO 錯誤模式為異常
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 啟動 session
    session_start();

    // 執行 SQL 查詢
    $sql = "SELECT * FROM `library_book`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // 處理查詢結果
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // 每一筆資料生成一個獨立的 PHP 網頁
        $filename = $row['File_name'];
        $content = "<html>";

        $content .= "<style>
            header{
                background-color:#EBEBEB;
                margin-top:0px;
                height:70px;
            }
            .booklogo {
                float:left;
            }
            .book {
                margin:20px 250px 20px 250px;
                display: flex;
                flex-direction: row;
            }
            .bookimgsrc {
                background-color:#ffffff;
                padding:50px 50px 50px 50px;
                border-style:solid;
                border-width: 1px;
                display:inline-block;
            }
            .booktext {

                word-break: break-all;
                display:inline-block;
                margin:0px 50px 20px 50px;
                vertical-align:top;

            }
            .introduction{
                margin:50px 250px 20px 250px;
            }   
            body{
            background-color:#D6CFC4;
            }
        </style>";

        $content .= "<header>";
        $content .= "<div class=\"booklogo\"><a href=Index.php><img src=\"img/logo.png\" width=\"120px\" ></a></div>";

        $content .= "<p align=right>";
        $content .="<a href=view_cart.php><button>查看購物車</button></a>";
        if(isset($_SESSION["sessionusername"])){
            $content .= "歡迎<font color=blue>".$_SESSION["sessionusername"]."</font>您好<a href=Logout.php><img width=40 heigh=30 src=img/1.png></a>";
        } else {
            $content .= "<a href=login.php><button>登入</button></a>";
        }
        $content .= "</p>";

        $content .= "</header>";
        $content .= "<body>";

        $content .= "<div class=book>";
        $content .= "<div class=bookimgsrc>";
        $content .= "<img src=img/{$row['book_img']}>";
        $content .= "</div>";

        $content .= "<div class=booktext>";
        $content .= "<h2>{$row['all_book']}</h2><hr>";
        $content .= "作者： {$row['author']}<br>";
        $content .= "出版社： {$row['publishing_house']}<br>";
        $content .= "出版日期： {$row['Publication_date']}<br>";
        $content .= "價格：{$row['price']}";
        $content .= "<form action='add_to_cart.php' method='post'>";
        $content .="<input type='hidden' name='bookid' value='{$row['bookid']}'>";
        $content .="<input type='submit' value='加入購物車'>";
        $content .="</form>";
        $content .= "</div>";

        $content .= "</div>";

        $content .= "<div class=introduction>";
        $content .= "<center><h3>內容簡介</h3></center><hr>";
        $content .= "<br>{$row['Introduction']}";
        $content .= "</div>";

        $content .= "</body></html>";

        // 將內容寫入檔案
        file_put_contents($filename, $content);

        echo "已生成網頁: <a href='$filename' target='_blank'>$filename</a><br>";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// 關閉連接
$conn = null;
?>
