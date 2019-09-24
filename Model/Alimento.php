<?php

    class Alimento {
        public $nome_alimento = '';

        function getIdAlimento() {
            include 'conexao_bd.php';
	        $query = "SELECT id_alimento
			    FROM nutriresearch.alimento
                WHERE tx_nome = '$nome_alimento';";

            $result = pg_query($conexao, $query);
            $row = pg_fetch_array($result);
            return $row['id_alimento'];
        }
    }

?>