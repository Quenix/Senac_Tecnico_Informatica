<?php

require('connection.php');

$insert = $connect->prepare("INSERT INTO entrevistados VALUES()");
$insert->execute();

$select = $connect->prepare("SELECT * FROM entrevistados ORDER BY id_entrevistado DESC LIMIT 1");
$select->execute();
$id = $select->fetchColumn();
?>
<HTML>
	<head>
		<meta charset= "UTF-8">
		<title>Questionário Senac</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</head>

	<body>

		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-9">
					<form method="POST" action="confirmacao.php">
						<input type="hidden" value="<?= $id ?>" name="id">

						<?php
							if(isset($_SESSION['error'])){
								echo $_SESSION['error'];
								unset($_SESSION['error']);
							}
						 ?>
						<div class="form-group">
							<label for="name">Qual o seu nome?</label>
							<input class="form-control" type="text" name="1">
						</div>

						<div class="form-group">
							<label>Qual sua idade?</label>
							<input class="form-control" type="number" name="2">
						</div>

						<div class="form-group">
							<label>Qual é o seu sexo?</label>
							<select class="form-control" name="3">
								<option value="masculino">Masculino</option>
								<option value="feminino">Feminino</option>
								<option value="ni">Não informado</option>
							</select>
						</div>

						<div class="form-group">
							<label>Qual o ano da sua turma?</label>
							<select class="form-control" name="4">
								<option value="2016">2016</option>
								<option value="2017">2017</option>
								<option value="2018">2018</option>
							</select>
						</div>

						<div class="form-group">
							<label>Qual é a sua expectativa para o curso?</label>
							<textarea class="form-control" rows="4" cols="50" name="5"></textarea>
						</div>

						<div class="form-group">
							<label>Você possui algum conhecimento na área?</label>
							<input class="form-control" type="text" name="6">
						</div>

						<div class="form-group">
							<label>Você já trabalhou ou trabalha na área?</label>
							<input class="form-control" type="text" name="7">
						</div>

						<div class="form-group">
							<label>Qual Sistema Operacional você prefere?</label>
							<input class="form-control" type="text" name="8">
						</div>

						<div class="form-group">
							<label>O que você acha da estrutura do Senac?</label>
							<input class="form-control" type="text" name="9">
						</div>

						<div class="form-group">
							<label>O que fez você escolher o Senac?</label>
							<input class="form-control" type="text" name="10">
						</div>

						<div class="form-group">
							<label>O que te atraiu no Técnico em Informática?</label>
							<input class="form-control" type="text" name="11">
						</div>

						<input class="form-control btn btn-primary" type="submit">

					</form>
				</div>
			</div>
		</div>
	</body>

</HTML>
