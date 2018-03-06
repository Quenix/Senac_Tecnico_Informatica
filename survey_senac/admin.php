<?php session_start(); ?>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style>
		.container{
			margin-top: 10%;
		}
		img{
			width: 50%;
			margin-left: 22%;
			margin-bottom: 10px
		}
		.btn{
			float:right;
		}

		</style>
	</head>
	<body>
		<section>
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
						<img class="img-responsive text-center" src="https://www.go.senac.br/portal/images/logo211x124.jpg" alt="LOGO SENAC">
						<?php
						if(isset($_SESSION['error']))
						{
							echo $_SESSION['error'];
							unset($_SESSION['error']);
						}
						?>
						<form action="" method="POST">
							<div class="form-group">
								<input type="email" class="form-control" placeholder="Email" name="email">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" placeholder="Password" name="senha">
							</div>
							<input type="submit" class="btn btn-primary text-uppercase" value="acessar">
							</form>
							<?php
		
							if(isset($_POST['email']) && isset($_POST['senha']))
							{
								$mail = $_POST['email'];
								$pass = $_POST['senha'];
								if($mail == "admin@senac.com" && $pass == "senac_admin")
								{
									$_SESSION['login'] = true;
									header("location:dashboard.php");
								}else
								{
									$_SESSION['error'] = "<div class='alert alert-danger text-center text-uppercase'>usuário e/ou senha incorreto</div>";
									header("location:admin.php");
								}
							}
							?>
						</div>
					</div>
				</div>
			</section>
		</body>
</html>
