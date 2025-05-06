<?php
session_start();
// Conexão com o banco usando mysqli
$mysqli = new mysqli('localhost', 'root', '', 'loja2');
if ($mysqli->connect_errno) {
    die('Erro ao conectar ao banco de dados: ' . $mysqli->connect_error);
}
$mysqli->set_charset("utf8");

// Adiciona produto ao carrinho
$status = "";
if (isset($_POST['codigo']) && $_POST['codigo'] != "") {
    $codigo = $_POST['codigo'];
    $resultado = $mysqli->query("SELECT descricao, preco, fotoA FROM produto WHERE codigo = '$codigo'");
    $row = $resultado->fetch_assoc();
    $descricao = $row['descricao'];
    $preco = $row['preco'];
    $foto = $row['fotoA'];

    $cartArray = array($codigo => array('descricao' => $descricao, 'preco' => $preco, 'foto' => $foto));

    if (empty($_SESSION["shopping_cart"])) {
        $_SESSION["shopping_cart"] = $cartArray;
        $status = "<div class='box'>Produto foi adicionado ao carrinho!</div>";
    } else {
        $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"], $cartArray);
        $status = "<div class='box'>Produto foi adicionado ao carrinho!</div>";
    }
}
?>

<HTML>
<HEAD>
 <TITLE>Pagina Principal</TITLE>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <style>
    body {
        font-family: 'Segoe UI', Arial, sans-serif;
        background: #f5f5f5;
        margin: 0;
        padding: 0;
    }
    .header {
        background: #fff;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        padding: 20px 0 10px 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: relative;
    }
    .header img.logo {
        margin-left: 40px;
        width: 180px;
        height: auto;
    }
    .header a.login-btn img {
        width: 110px;
        height: auto;
        margin-right: 40px;
    }
    .main-title {
        text-align: center;
        color: #6a1b9a;
        font-size: 2.2em;
        margin-top: 10px;
        margin-bottom: 0;
        letter-spacing: 1px;
        font-weight: 700;
    }
    .search-section {
        background: #fff;
        margin: 30px auto 0 auto;
        padding: 30px 30px 20px 30px;
        border-radius: 12px;
        max-width: 900px;
        box-shadow: 0 2px 16px rgba(0,0,0,0.07);
    }
    .search-section h2 {
        color: #333;
        font-size: 1.3em;
        margin-bottom: 18px;
        font-weight: 600;
    }
    .search-form {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        align-items: flex-end;
        justify-content: center;
    }
    .form-group {
        display: flex;
        flex-direction: column;
        min-width: 180px;
    }
    .form-group label {
        font-size: 1em;
        color: #444;
        margin-bottom: 6px;
        font-weight: 500;
    }
    .form-group select {
        padding: 8px 10px;
        border: 1px solid #bdbdbd;
        border-radius: 6px;
        font-size: 1em;
        background: #fafafa;
        transition: border 0.2s;
    }
    .form-group select:focus {
        border: 1.5px solid #6a1b9a;
        outline: none;
    }
    .search-btn {
        background: linear-gradient(90deg, #6a1b9a 60%, #8e24aa 100%);
        color: #fff;
        border: none;
        border-radius: 6px;
        padding: 12px 32px;
        font-size: 1.1em;
        font-weight: 600;
        cursor: pointer;
        box-shadow: 0 2px 8px rgba(106,27,154,0.08);
        transition: background 0.2s;
        margin-top: 8px;
    }
    .search-btn:hover {
        background: linear-gradient(90deg, #8e24aa 60%, #6a1b9a 100%);
    }
    .results-title {
        text-align: center;
        color: #333;
        font-size: 1.3em;
        margin-top: 40px;
        margin-bottom: 20px;
        font-weight: 600;
    }
    .products-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 32px;
        justify-content: center;
        margin-bottom: 40px;
    }
    .product-card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.08);
        width: 260px;
        padding: 18px 18px 16px 18px;
        display: flex;
        flex-direction: column;
        align-items: center;
        transition: box-shadow 0.2s;
        position: relative;
    }
    .product-card:hover {
        box-shadow: 0 6px 24px rgba(106,27,154,0.13);
    }
    .product-images {
        display: flex;
        gap: 8px;
        margin-bottom: 12px;
    }
    .product-images img {
        width: 90px;
        height: 90px;
        object-fit: cover;
        border-radius: 8px;
        background: #f3e5f5;
        border: 1px solid #e1bee7;
    }
    .product-desc {
        font-size: 1.08em;
        color: #222;
        font-weight: 600;
        margin-bottom: 6px;
        text-align: center;
        min-height: 40px;
    }
    .product-info {
        font-size: 0.98em;
        color: #555;
        margin-bottom: 4px;
        text-align: center;
    }
    .product-price {
        color: #6a1b9a;
        font-size: 1.18em;
        font-weight: 700;
        margin-bottom: 6px;
        text-align: center;
    }
    @media (max-width: 1000px) {
        .search-section { max-width: 98vw; }
        .products-grid { gap: 18px; }
        .product-card { width: 44vw; min-width: 180px; }
    }
    @media (max-width: 600px) {
        .header img.logo { margin-left: 10px; width: 120px; }
        .header a.login-btn img { margin-right: 10px; width: 70px; }
        .main-title { font-size: 1.2em; }
        .search-section { padding: 12px 4vw 10px 4vw; }
        .product-card { width: 90vw; }
    }
 </style>
</HEAD>
<body>
    <div class="header">
        <img src="logo.png" class="logo" alt="Logo">
        <a href="login.html" class="login-btn"><img src="login.png" alt="Login"></a>
    </div>
    <h1 class="main-title">Material Esportivo</h1>
    <div class="search-section">
        <h2>Pesquise por produtos</h2>
        <form class="search-form" name="formulario" method="post" action="pesquisar.php">
            <div class="form-group">
                <label for="categoria">Categorias:</label>
                <select name="categoria" id="categoria">
                    <option value="" selected="selected">Selecione...</option>
                    <?php
                    $query = $mysqli->query("SELECT codigo, nome FROM categoria");
                    while($categorias = $query->fetch_assoc())
                    {?>
                    <option value="<?php echo $categorias['codigo']?>">
                        <?php echo $categorias['nome']   ?></option>
                    <?php }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tipo">Tipo:</label>
                <select name="tipo" id="tipo">
                    <option value="" selected="selected">Selecione...</option>
                    <?php
                    $query = $mysqli->query("SELECT codigo, nome FROM tipo");
                    while($tipo = $query->fetch_assoc())
                    {?>
                    <option value="<?php echo $tipo['codigo']?>">
                        <?php echo $tipo['nome']   ?></option>
                    <?php }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="marca">Marcas:</label>
                <select name="marca" id="marca">
                    <option value="" selected="selected">Selecione...</option>
                    <?php
                    $query = $mysqli->query("SELECT codigo, nome FROM marca");
                    while($marcas = $query->fetch_assoc())
                    {?>
                    <option value="<?php echo $marcas['codigo']?>">
                        <?php echo $marcas['nome']   ?></option>
                    <?php }
                    ?>
                </select>
            </div>
            <button class="search-btn" type="submit" name="pesquisar">Pesquisar</button>
        </form>
    </div>
    <div>
<?php

// Exibe o ícone do carrinho com a contagem de itens
if (!empty($_SESSION["shopping_cart"])) {
    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
    echo '<div class="cart_div" style="position: fixed; top: 80px; right: 20px; z-index: 1001;">';
    echo '<a href="cart.php"><img src="carrinho.png" alt="Carrinho" /> Carrinho <span>' . $cart_count . '</span></a>';
    echo '</div>';
}

if (isset($_POST['pesquisar']))
{
    // Pega os filtros do formulário
    $marca     = !empty($_POST['marca']) ? intval($_POST['marca']) : null;
    $categoria = !empty($_POST['categoria']) ? intval($_POST['categoria']) : null;
    $tipo      = !empty($_POST['tipo']) ? intval($_POST['tipo']) : null;

    // Monta a query dinamicamente
    $sql = "SELECT produto.descricao, produto.cor, produto.tamanho, produto.preco, produto.fotoA, produto.fotoB
            FROM produto
            WHERE 1=1";
    if ($marca) {
        $sql .= " AND produto.codmarca = $marca";
    }
    if ($categoria) {
        $sql .= " AND produto.codcategoria = $categoria";
    }
    if ($tipo) {
        $sql .= " AND produto.codtipo = $tipo";
    }

    $result = $mysqli->query($sql);

    // Exibe os resultados
    if (!$result || $result->num_rows == 0) {
        echo '<h1 class="results-title">Desculpe, mas sua busca não retornou resultados ... </h1>';
    } else {
        echo '<div class="results-title">Resultado da pesquisa de Produtos:</div>';
        echo '<div class="products-grid">';
        while ($dados = $result->fetch_object())
        {
            echo '<div class="product-card">';
            echo '<form method="post" action="">';
            echo '<input type="hidden" name="codigo" value="' . $dados->codigo . '" />';
            echo '<div class="product-images">';
            echo '<img src="imagens/'.$dados->fotoA.'" alt="Foto A" />';
            echo '<img src="imagens/'.$dados->fotoB.'" alt="Foto B" />';
            echo '</div>';
            echo '<div class="product-desc">'.htmlspecialchars($dados->descricao).'</div>';
            echo '<div class="product-info">Cor: '.htmlspecialchars($dados->cor).' | Tamanho: '.htmlspecialchars($dados->tamanho).'</div>';
            echo '<div class="product-price">R$ '.number_format($dados->preco,2,',','.').'</div>';
            echo '<button type="submit" class="buy-button">COMPRAR</button>';
            echo '</form>';
            echo '</div>';
        }
        echo '</div>';
    }
}
?>
    </div>
</body>
</HTML>
