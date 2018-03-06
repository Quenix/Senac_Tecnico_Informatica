<?php

require('connection.php');

if($_POST['id'] == false)
{
  $_SESSION['error'] = "<div class='alert alert-danger text-uppercase'>Não foi passado um id, tente novamente <span class='glyphicon glyphicon-remove'></span></div>";
  header("location:perguntas.php");
}


$id = $_POST['id'];
$ip = $_SERVER["REMOTE_ADDR"];


$select = $connect->prepare("SELECT COUNT(*) FROM perguntas");
$select->execute();
$result = $select->fetchColumn();

for($i = 1; $i <= $result; $i++)
{
  $answers[$i] = $_POST[$i];
}

//var_dump($answers);


if (!empty($answers[4]) && !empty($answers[5]) && !empty($answers[6]) && !empty($answers[7]) && !empty($answers[8]) && !empty($answers[9]) && !empty($answers[10]) && !empty($answers[11]))
{
	try{
		
    $insert = $connect->prepare("INSERT INTO respostas(id_entrevistado, id_pergunta, texto_resposta, ip_usuario) VALUES(:INTERVIEWED, :ID_QUESTION, :ANSWERS_TEXT, :IP_USER)");
    for($i = 1; $i <= $result; $i++)
    {/*
		echo ":INTERVIEWED, $id <br>";
		echo ":ID_QUESTION, $i <br>";
		echo ":ANSWERS_TEXT, $answers[$i] <br>";
		echo ":IP_USER, $ip <br>";
		echo "EXECUTA <br>";*/
      $insert->bindParam(":INTERVIEWED", $id);
      $insert->bindParam(":ID_QUESTION", $i);
      $insert->bindParam(":ANSWERS_TEXT", $answers[$i]);
      $insert->bindParam(":IP_USER", $ip);
		$insert->execute();
    }
	if($insert == true){
	$_SESSION['error'] = "<div class='alert alert-success'>INSERIDO COM SUCESSO</div>";
	header("location:perguntas.php");
	}
	}catch (PDOExpection $e){
		echo "ERROR BANCO" . $e->getMessage();
	}
	

 
}else
{
  $_SESSION['error'] = "<div class='alert alert-danger'> preencha os dados obrigátorios corretamente! <span class='glyphicon glyphicon-remove'></span></div>";
  header("location:perguntas.php");
}

?>
