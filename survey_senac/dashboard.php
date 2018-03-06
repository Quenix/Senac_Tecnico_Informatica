<?php

require('connection.php');

if(isset($_SESSION['login']) == false)
{
	$_SESSION['error'] = "<div class='alert alert-danger tex-center text-uppercase'>usuário e/ou senha incorreto</div>";
	header("location:admin.php");
}

?>
<html>
	<head>
    <meta charset="UTF-8">
		<title>ADMINISTRADOR</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<section>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-7 col-md-offset-3 col-sm-6 col-sm-offset-4 col-xs-12">
						<h1 class="text-center"> Usuários entrevistados </h1>
						<hr>
						<a class="btn btn-success text-left text-uppercase" href="planilha.php" style="margin-bottom: 10px;">imprimir todos</a>
						<a href="logout.php" class="btn btn-danger text-right text-uppercase" style="float:right">Sair</a>
						<table class="table table-condensed table-hover">
							<thead>
								<tr class="success">
									<th>ID Entrevistado</th>
									<th>Nome usuário</th>
									<th>Responsável</th>
									<th>Data e Hora</th>
									<!--<th>imprimir</th>-->
								</tr>
							</thead>
							<tbody>
								<?php

								$select = $connect->prepare("SELECT perguntas.id_pergunta, texto_pergunta, id_entrevistado, texto_resposta, ip_usuario, data_pesquisa FROM respostas inner join perguntas on respostas.id_pergunta = perguntas.id_pergunta WHERE perguntas.id_pergunta = 1");
								$select->execute();
								while($result = $select->fetch(PDO::FETCH_ASSOC)){
									
									$date = $result['data_pesquisa'];
									$hours = substr($date, -8) ."<br><br>";
									$date_old = substr($date, 0, -9);
									$date_new = explode("-", $date_old);
									$date_1 = "$date_new[2]/$date_new[1]/$date_new[0] - $hours";
									?>

									<tr class="active">
										<td><?php echo $result['id_entrevistado']; ?></td>
										<td><?php echo $result['texto_resposta']; ?></td>
										<td><?php echo $result['ip_usuario']; ?></td>
										<td><?php echo $date_1?></td>
										<!--<td><a class="btn btn-info" ><span class=" 	glyphicon glyphicon-tint"><span></a></td>-->
									</tr>
									<?php } ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</section>
		</body>
</html>
