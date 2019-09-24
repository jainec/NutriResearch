 <?php
    $id_alimento = $_SESSION['id_alimento'];

    $query = "SELECT 
                tx_nome, 
                fl_qtd, 
                fl_energia, 
                fl_ptn, 
                fl_carb, 
                fl_lip, 
                fl_ca, 
                fl_fe, 
                fl_vitc, 
                fl_vita,
                tx_descricao
            FROM 
                nutriresearch.composicao c
            INNER JOIN 
                nutriresearch.alimento a
            ON 
                (c.id_alimento = a.id_alimento)
            INNER JOIN 
                nutriresearch.fonte f
            ON 
                (c.id_fonte = f.id_fonte)
            WHERE 
                a.id_alimento = $id_alimento
            AND 
                c.id_medida = 1;";
    $result1 = pg_query($conexao, $query);
   
    $row_nutriente = pg_fetch_array($result1);
  ?>

