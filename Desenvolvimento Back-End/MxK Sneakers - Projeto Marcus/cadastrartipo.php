<?php
// Conectar com banco de dados
$conectar = mysqli_connect('localhost', 'root', '', 'loja2');
if (!$conectar) {
    die("Falha na conexão: " . mysqli_connect_error());
}

if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    
    $sql = "INSERT INTO tipo (nome) VALUES ('$nome')";
    
    if (mysqli_query($conectar, $sql)) {
        echo "Cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . mysqli_error($conectar);
    }
}

if (isset($_POST['alterar'])) {
    $codigo = $_POST['codigo'];
    $nome   = $_POST['nome'];
    
    $sql = "UPDATE tipo SET nome = '$nome' WHERE codigo = '$codigo'";
    
    if (mysqli_query($conectar, $sql)) {
        echo "Alterado com sucesso!";
    } else {
        echo "Erro ao alterar: " . mysqli_error($conectar);
    }
}

if (isset($_POST['excluir'])) {
    $codigo = $_POST['codigo'];
    
    $sql = "DELETE FROM tipo WHERE codigo = '$codigo'";
    
    if (mysqli_query($conectar, $sql)) {
        echo "Excluído com sucesso!";
    } else {
        echo "Erro ao excluir: " . mysqli_error($conectar);
    }
}

if (isset($_POST['listar'])) {
    $sql = "SELECT * FROM tipo";
    $resultado = mysqli_query($conectar, $sql);
    
    if (mysqli_num_rows($resultado) == 0) {
        echo "Nenhum tipo encontrado!";
    } else {
        echo "<b>Lista de Tipos:</b><br>";
        while ($dados = mysqli_fetch_assoc($resultado)) {
            echo "Código: " . $dados['codigo'] . " - Nome: " . $dados['nome'] . "<br>";
        }
    }
}

mysqli_close($conectar);
?>
