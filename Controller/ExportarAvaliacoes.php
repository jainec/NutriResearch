<?php
	include '..\Model\sqlSelectTodasAvaliacoesDeUmIndividuo.php';

	$columnHeader = '';  
	$columnHeader = "Indivíduo" . "\t" . "Num. Avaliação" . "\t" . "Data da Avaliação" . "\t" . "Dia da Semana" . "\t" . "Refeição" . "\t" . "Horário" . "\t" . "Alimento" . "\t" . "Medida" . "\t" . "Quantidade" . "\t" . "Loca da Refeição" . "\t" . "Marca" . "\t";  
  
	$setData = '';  

	while ($rec = pg_fetch_row($result)) {  
		$rowData = '';  
		foreach ($rec as $value) {  
			$value = '"' . $value . '"' . "\t";  
			$rowData .= $value;  
		}  
		$setData .= trim($rowData) . "\n";  
	}  

	header("Content-type: application/octet-stream");  
	header("Content-Disposition: attachment; filename=minhas_avaliacoes_nutriresearch.xls");  
	header("Pragma: no-cache");  
	header("Expires: 0");  
	  
	echo ucwords($columnHeader) . "\n" . $setData . "\n";  
  
?>	