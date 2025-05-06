<?php
// Conectar com o banco de dados usando MySQLi
$conectar = mysqli_connect('localhost', 'root', '', 'loja2');

if (!$conectar) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// Cadastro de produto
if (isset($_POST['gravar'])) {
    $descricao = $_POST['descricao'];
    $cor = $_POST['cor'];
    $tamanho = $_POST['tamanho'];
    $preco = $_POST['preco'];
    $codmarca = $_POST['codmarca'];
    $codcategoria = $_POST['codcategoria'];
    $codtipo = $_POST['codtipo'];
    $fotoA = $_FILES['fotoA'];
    $fotoB = $_FILES['fotoB'];

    $diretorio = "imagens/";
    
    //mudar nome foto1
    $extensao1 = strtolower(substr($_FILES['fotoA']['name'], -4));
    $novo_nome1 = md5(time().$extensao1);
    move_uploaded_file($_FILES['fotoA']['tmp_name'], $diretorio.$novo_nome1);

    //mudar nome foto2
    $extensao2 = strtolower(substr($_FILES['fotoB']['name'], -6));
    $novo_nome2 = md5(time().$extensao2);
    move_uploaded_file($_FILES['fotoB']['tmp_name'], $diretorio.$novo_nome2);

    $sql = "INSERT INTO produto (descricao, cor, tamanho, preco, codmarca, codcategoria, codtipo, fotoA, fotoB)
            VALUES ('$descricao','$cor','$tamanho','$preco','$codmarca', '$codcategoria', '$codtipo', '$novo_nome1', '$novo_nome2')";
    
    if (mysqli_query($conectar, $sql)) {
        echo "Produto cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . mysqli_error($conectar);
    }
}

// Exclusão de produto
if (isset($_POST['excluir'])) {

    $sql = "DELETE FROM produto WHERE codigo = '$codigo'";

    if (mysqli_query($conectar, $sql)) {
        echo "Produto excluído com sucesso!";
    } else {
        echo "Erro ao excluir: " . mysqli_error($conectar);
    }
}

// Alteração de produto
if (isset($_POST['alterar'])) {
    $descricao = $_POST['descricao'];
    $codcategoria = $_POST['codcategoria'];
    $codtipo = $_POST['codtipo'];
    $codmarca = $_POST['codmarca'];
    $cor = $_POST['cor'];
    $tamanho = $_POST['tamanho'];
    $preco = $_POST['preco'];

    $sql = "UPDATE produto SET descricao='$descricao', codcategoria='$codcategoria', codtipo='$codtipo', codmarca='$codmarca', cor='$cor', tamanho='$tamanho', preco='$preco'
            WHERE codigo = '$codigo'";

    if (mysqli_query($conectar, $sql)) {
        echo "Produto atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar: " . mysqli_error($conectar);
    }
}

// Pesquisa de produtos
if (isset($_POST['pesquisar'])) {
    $sql = "SELECT * FROM produto";
    $result = mysqli_query($conectar, $sql);

    if (mysqli_num_rows($result) == 0) {
        echo "Nenhum produto encontrado.";
    } else {
        echo "<b>Produtos Cadastrados:</b><br><br>";
        while ($dados = mysqli_fetch_assoc($result)) {
            echo "Código: " . $dados['codigo'] . "<br>";
            echo "Descrição: " . $dados['descricao'] . "<br>";
            echo "Categoria: " . $dados['codcategoria'] . "<br>";
            echo "Tipo: " . $dados['codtipo'] . "<br>";
            echo "Marca: " . $dados['codmarca'] . "<br>";
            echo "Cor: " . $dados['cor'] . "<br>";
            echo "Tamanho: " . $dados['tamanho'] . "<br>";
            echo "Preço: R$ " . $dados['preco'] . "<br>";

            if (!empty($dados['fotoA'])) {
                echo '<img src="fotos/' . $dados['fotoA'] . '" height="100" width="100"><br>';
            }
            if (!empty($dados['fotoB'])) {
                echo '<img src="fotos/' . $dados['fotoB'] . '" height="100" width="100"><br>';
            }

            echo "<br>";
        }
    }
}

// Fechar conexão
mysqli_close($conectar);
?>
