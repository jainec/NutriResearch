 <?php
    $id_alimento = $_SESSION['id_alimento'];

    $query = "SELECT 
               *
            FROM 
                nutriresearch.dia_da_semana;";
    $result = pg_query($conexao, $query);

  ?>

