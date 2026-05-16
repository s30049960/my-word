

<meta charset=utf-8>
<html>


<style >
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

	
</header>
<body>
	<div class=surface>
		<center><h1>註冊帳號</h1></center>
		<form method="post" action="Register_process.php">
			
				
			帳號:<br><input type="text" name="userid" value=""><br>
			密碼:<br><input type="password" name="userpassword" value=""><br>
			確認密碼:<br><input type="password" name="userpassword_confirm" value=""><br>
			郵件:<br><input type="text" name="usermail" value=""><br>
			性別:<input type="radio" name="sex" value="男">男
			<input type="radio" name="sex" value="女">女<br><br>
			<center><input type="submit" value="註冊"><br></center>
			
		</form>
</body>
</html>
</body>
</html>