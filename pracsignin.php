<?php
$server="localhost";
$user="root";
$password="";
$db="customer";
$con=mysqli_connect($server,$user,$password,$db);
?>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
</head>
<body>
	<div class="container">
		<div class="jumbotron text-center"><h2>Login Page</h2></div>
		<div class="col-md-4"></div>
		<form class="col-md-4" method="post">
			<div class="form-group">
				<label class="control-label">Username</label>
				<input type="text" class="form-control" name="user" required>
			</div>
			<div class="form-group">
				<label class="control-label">Password</label>
				<input type="password" class="form-control" name="pass" required>
			</div>
			<div class="form-group">
				<button class="btn btn-primary btn-block" name="submit_user_btn">Submit Form</button>
			</div>
		</form>
	</div>
</body>
</html>
<?php
	if(isset($_POST['submit_user_btn']))
	{
		session_start();
		$name=$_POST['user'];
		$pwd=$_POST['pass'];
		//session set
		$_SESSION['name']="$name";
		$_SESSION['pwd']="$pwd";
		$sqlquery="select registration_number,username,account_balance,phone_number from customer_account where username='$name' and password='$pwd'";
		$result=mysqli_query($con,$sqlquery);
		$rows=mysqli_num_rows($result);
		if($rows==1)
		{?>
			<script>window.location="pracsignin_succ.php"</script>
		<?php 
		}
		else{
			?><script>window.location="pracmain.php"</script>
		<?php
		}
	}	
		?>
		
		