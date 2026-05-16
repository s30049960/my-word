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
		<center><h1>登入帳號</h1></center>
		<form method=post action=Login_process.php >
		帳號:<br>
		<input type=text name=userid value=<?php if (isset($_COOKIE["cookieusername"]))echo $_COOKIE["cookieusername"]; ?>><br>
		密碼:<br>
		<input type=password name=userpassword value=<?php if (isset($_COOKIE["cookiepassword"]))echo $_COOKIE["cookiepassword"]; ?>><br>
		
		<a href=Register.php>還沒有帳號?點我註冊</a><br><br>
		
		<center><input type="submit" value="登入"><br></center>




		</form>
		
	</div>
</body>
</html>