<?php 
 session_start();
 if(!empty($_SESSION['username'])){
    header("Location: index.php");}
?>
<!DOCTYPE html>
<html>
<body>
<head>
  <title>Login Page</title>
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />

  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
  <script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
  <script src="js/main.js" type="text/javascript"></script>
</head>		
	<div id="login">
				<form class="form-login" method="post" action="loginControl.php">
					<h3>Not a member? Join now!</h3>
					<label for="username" class="sr-only">Username</label>
					<input id="username" class="form-control" name="username" placeholder="Username" required="">
					<label for="password" class="sr-only">Password</label>
					<input id="password" class="form-control" type="password" name="password" placeholder="Password" required="">
					<div>
						<a href="#">
							Forget my Password
						</a>
					</div>
					<div class="ofh">
						<div class="text" style="float:left">
							Stay Logged in for:
						</div>
						<div class="list" style="float:right">
							<select name="duration">
								<option value="10">
									10 Sec
								</option>
								<option value="86400">
									1 day
								</option>
							</select>
						</div>
					</div>
					<input type="submit" class="btn btn-primary" name="login" value="Login"/>
				</form>
				<?php
				if(!empty($_SESSION['error']))
				{
					echo $_SESSION['error'];
				}?>
			</div>
	</body>
</html>
