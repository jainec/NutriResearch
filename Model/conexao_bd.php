 <?php
    //Aqui colocamos o servidor em que está o nosso banco de dados, no nosso exemplo é a conexão com um servidor local, portanto localhost
    $servidor = "localhost";
    //Aqui é o nome de usuário do seu banco de dados, root é o servidor inicial e básico de todo servidor, mas recomenda-se não usar o usuario root e sim criar um novo usuário
    $usuario = "postgres";
    //Aqui colocamos a senha do usuário, por padrão o usuário root vem sem senha, mas é altamente recomendável criar uma senha para o usuário root, visto que ele é o que tem mais privilégios no servidor
    $senha ="postgres";

    $con_string = "host=localhost port=5432 dbname=nutriresearch user=postgres password=postgres";

    //Aqui criamos a conexão utilizando o servidor, usuario e senha, caso dê erro, retorna um erro ao usuário.
    $conexao = pg_connect($con_string) or die ("Não foi possível conectar ao servidor PostGreSQL");
    //caso a conexão seja efetuada com sucesso, exibe uma mensagem ao usuário
  ?>

