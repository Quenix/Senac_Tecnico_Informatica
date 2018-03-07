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
		<style>
	
		
			img {
				
				width : 70px;
			}
	
		</style>
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
							<select class="form-control" name="3" required>
								<option value="" disabled selected> Selecione sua opção</option>
								<option value="masculino">Masculino</option>
								<option value="feminino">Feminino</option>
								<option value="ni">Não informado</option>				
							</select>
						</div>

						<div class="form-group">
							<label>Qual o ano da sua turma?</label>
							<select class="form-control" name="4" required>
								<option value="" disabled selected> Selecione sua opção</option>
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
							<select class="form-control" name="6" required>
								<option value="" disabled selected> Selecione sua opção</option>
								<option value="sim">Sim</option>
								<option value="nao">Não</option>
							</select>
						</div>

						<div class="form-group">
							<label>Você já trabalhou ou trabalha na área?</label>
							<select class="form-control" name="7" required>
								<option value="" disabled selected> Selecione sua opção</option>
								<option value="sim">Sim</option>
								<option value="nao">Não</option>
							</select>
						</div>

						<div class="form-group">									
							<label>Qual Sistema Operacional você prefere?</label>
							<div class="form-group">
								<input type="radio" name="8" id="i1" value="windows" required/>
								<label for="i1"><img src="img/windows.jpg" alt=""></label>
								<input type="radio" name="8" id="i2" value="linux"/>
								<label for="i2"><img src="img/linux.png" alt=""></label>
								<input type="radio" name="8" id="i3" value="macapple"/>
								<label for="i3"><img src="img/mac.png" alt=""></label>
								<input type="radio" name="8" id="i4" value="outros" alt=""/>
								<label for="i4"><img src="img/outros.png">Outros</label>
							</div>							
						</div>
						

						<div class="form-group">
							<label>O que você acha da estrutura do Senac?</label>
							<select class="form-control" name="9" required>
								<option value="" disabled selected> Selecione sua opção</option>
								<option value="pessimo">Péssimo</option>
								<option value="ruim">Ruim</option>
								<option value="regular">Regular</option>
								<option value="bom">Bom</option>
								<option value="otimo">Ótimo</option>	
								<option value="excelente">Excelente</option>									
							</select>
						</div>

						<div class="form-group">
							<label>O que fez você escolher o Senac?</label>
							<textarea class="form-control" rows="4" cols="50" name="10"required></textarea>
						</div>
						
						<div class="form-group">
							<label>O que te atraiu no Técnico em Informática?</label>
							<textarea class="form-control" rows="4" cols="50" name="11"required></textarea>
						</div>
						
						<div class="form-group">
							<input class="form-control btn btn-primary" type="submit">
						</div>
						
					</form>
				</div>
			</div>
		</div>
	</body>

</HTML>
