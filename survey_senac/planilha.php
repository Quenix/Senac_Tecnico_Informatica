<!--**
 * @author Cesar Szpak - Celke -   cesar@celke.com.br
 * @pagina desenvolvida usando framework bootstrap,
 * o código é aberto e o uso é free,
 * porém lembre -se de conceder os créditos ao desenvolvedor.
 *-->
 <?php
	//session_start();
	//require('connection.php');
	//MOSTRAR DADOS EM PDO - URGENTE
	$connect = mysqli_connect("localhost", "root", "", "survey_senac");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Contato</title>
	<head>
	<body>
		<?php
		// Definimos o nome do arquivo que será exportado
		$arquivo = 'dados_entrevistados.xls';

		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="5">Planilha dos entrevistados</tr>';
		$html .= '</tr>';


		$html .= '<tr>';
		$html .= '<td><b>ID_Perguntas</b></td>';
		$html .= '<td><b>Perguntas</b></td>';
		$html .= '<td><b>ID_Entrevistados</b></td>';
		$html .= '<td><b>Respostas</b></td>';
		$html .= '<td><b>IP_Usuário</b></td>';
		$html .= '</tr>';

		//SELECIONA ITENS DA TABELA
		$select = "SELECT perguntas.id_pergunta, texto_pergunta, id_entrevistado, texto_resposta, ip_usuario";
		$select .=" FROM respostas inner join perguntas on respostas.id_pergunta = perguntas.id_pergunta";

		$sql = mysqli_query($connect , $select);

		while($show = mysqli_fetch_assoc($sql)){
			$html .= '<tr>';
			$html .= '<td>'.$show["id_pergunta"].'</td>';
			$html .= '<td>'.$show["texto_pergunta"].'</td>';
			$html .= '<td>'.$show["id_entrevistado"].'</td>';
			$html .= '<td>'.$show["texto_resposta"].'</td>';
			$html .= '<td>'.$show["ip_usuario"].'</td>';
			$html .= '</tr>';
			;
		}
		// Configurações header para forçar o download

		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );

		// Envia o conteúdo do arquivo
		echo $html;
		exit; ?>
	</body>
</html>
