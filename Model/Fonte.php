<?php

    class Fonte {
        public $nome_fonte = '';

        function getIdFonte() {
            include 'conexao_bd.php';
	        $query = "SELECT id_fonte
			    FROM nutriresearch.fonte
                WHERE tx_descricao = '$nome_fonte';";

            $result = pg_query($conexao, $query);
            return $result;
        }
    }

?>