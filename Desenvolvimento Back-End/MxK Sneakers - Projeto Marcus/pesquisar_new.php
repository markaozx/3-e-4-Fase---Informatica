<?php
$connect = mysqli_connect('localhost','root','','loja');
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MxK Sneakers</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="logo.png" width="180" height="60" alt="Street Sport Logo">
        </div>
        <div class="login-container">
            <a href="login/login.html"><img src="login.png" width="130" height="60" alt="Login"></a>
        </div>
    </header>

    <div class="container">
        <h1 class="titulo-principal">MxK Sneakers</h1>
        
        <div class="pesquisa-container">
            <h1 class="titulo-pesquisa">Filtrar produtos</h1>
            
            <form name="formulario" method="post" action="pesquisar_new.php" class="filtros-form">
                <div class="filtro-grupo">
                    <label for="categoria">Categorias:</label>
                    <select name="categoria" id="categoria">
                        <option value="" selected="selected">Selecione...</option>
                        <?php
                        $query = mysqli_query($connect, "SELECT codigo, nome FROM categoria");
                        while($categorias = mysqli_fetch_array($query)) {
                        ?>
                        <option value="<?php echo $categorias['codigo']?>">
                            <?php echo $categorias['nome'] ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                
                <div class="filtro-grupo">
                    <label for="tipo">Tipo:</label>
                    <select name="tipo" id="tipo">
                        <option value="" selected="selected">Selecione...</option>
                        <?php
                        $query = mysqli_query($connect, "SELECT codigo, nome FROM tipo");
                        while($tipo = mysqli_fetch_array($query)) {
                        ?>
                        <option value="<?php echo $tipo['codigo']?>">
                            <?php echo $tipo['nome'] ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                
                <div class="filtro-grupo">
                    <label for="marca">Marcas:</label>
                    <select name="marca" id="marca">
                        <option value="" selected="selected">Selecione...</option>
                        <?php
                        $query = mysqli_query($connect, "SELECT codigo, nome FROM marca");
                        while($marcas = mysqli_fetch_array($query)) {
                        ?>
                        <option value="<?php echo $marcas['codigo']?>">
                            <?php echo $marcas['nome'] ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                
                <div class="filtro-grupo">
                    <input type="submit" name="pesquisar" value="Pesquisar" class="botao-pesquisar">
                </div>
            </form>
        </div>

        <div class="resultados-container">
            <?php
            if (isset($_POST['pesquisar'])) {
                $marca = (empty($_POST['marca'])) ? null : $_POST['marca'];
                $categoria = (empty($_POST['categoria'])) ? null : $_POST['categoria'];
                $tipo = (empty($_POST['tipo'])) ? null : $_POST['tipo'];

                $sql = "SELECT p.descricao, p.cor, p.tamanho, p.preco, p.foto1, p.foto2,
                            m.nome as marca_nome, c.nome as categoria_nome, t.nome as tipo_nome
                        FROM produto p
                        JOIN marca m ON p.codmarca = m.codigo
                        JOIN categoria c ON p.codcategoria = c.codigo
                        JOIN tipo t ON p.codtipo = t.codigo
                        WHERE 1=1";
                
                if ($marca) {
                    $sql .= " AND p.codmarca = $marca";
                }
                if ($categoria) {
                    $sql .= " AND p.codcategoria = $categoria";
                }
                if ($tipo) {
                    $sql .= " AND p.codtipo = $tipo";
                }

                $result = mysqli_query($connect, $sql);
                
                if(mysqli_num_rows($result) == 0) {
                    echo '<div class="sem-resultados">
                            <h2>Desculpe, mas sua busca não retornou resultados...</h2>
                            <p>Tente outros filtros ou categorias.</p>
                          </div>';
                } else {
                    echo "<h2 class='titulo-resultados'>Produtos encontrados</h2>";
                    echo "<table class='tabela-produtos'>";
                    echo "<tr>
                            <th>Produto</th>
                            <th>Cor</th>
                            <th>Tamanho</th>
                            <th>Preço</th>
                            <th>Marca</th>
                            <th>Categoria</th>
                            <th>Tipo</th>
                            <th>Fotos</th>
                          </tr>";
                    
                    while ($dados = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td><strong>".$dados['descricao']."</strong></td>";
                        echo "<td>".$dados['cor']."</td>";
                        echo "<td>".$dados['tamanho']."</td>";
                        echo "<td class='preco'>R$ ".number_format($dados['preco'], 2, ',', '.')."</td>";
                        echo "<td>".$dados['marca_nome']."</td>";
                        echo "<td>".$dados['categoria_nome']."</td>";
                        echo "<td>".$dados['tipo_nome']."</td>";
                        echo "<td class='fotos-produto'>";
                        echo '<img src="produto/fotos/'.$dados['foto1'].'" height="100" width="150" alt="Foto 1" />';
                        echo '<img src="produto/fotos/'.$dados['foto2'].'" height="100" width="150" alt="Foto 2" />';
                        echo "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            }
            ?>
        </div>
    </div>

    <!-- Você pode adicionar um rodapé aqui -->
    <footer style="background-color: #000; color: #fff; text-align: center; padding: 20px; margin-top: 40px;">
        <p>© 2025 Street Sport - Todos os direitos reservados</p>
    </footer>
</body>
</html>