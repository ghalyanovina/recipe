<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login </title>
  
  
      <link rel="stylesheet" href="/fiture/css/styleAdmin.css">

  
</head>

<body>
 	<div class="wrap">
		<div class="avatar">
      <img src="/fiture/img/avatar.png">
		</div>
		<form action="/admin/doLogin" method="post">
			<input type="text" placeholder="username" required name="username">
			<div class="bar">
				<i></i>
			</div>
			<input type="password" placeholder="password" required name="password" >
			<button>Sign in</button>
		</form>
		<?php if($status == "gagal") { ?>
		<p style="color: #f00">Login gagal coba lagi</p>
		<?php } ?>
	</div>
  
    <script src="/fiture/js/index.js"></script>

</body>
</html>
