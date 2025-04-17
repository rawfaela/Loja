<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylessss.css" type="text/css">
    <link rel="icon" type="image/x-icon" href="imagens/icone.png">  

    <title>Home</title>

</head>  <!-- STYLE DO CADPRODUTO E CADMARCA NAO PEGA -->
<body id="bodyhome">
    <div id="menu">
        <a href="home.php"><img src="/imagens/logoSF.png" class="logo"></a>
        <h1>Sport Fashion</h1>
        <a href="login.php" class="botaologin">Login</a>
        
    </div>
    <div id="meio">
        <div id="pesquisas">
            <form action="home.php" method="post">
                <br>
                <span class="titulopesq">Tipos</span>
                <br>
                <input type="checkbox" name="roupas"> Roupas
                <br>
                <input type="checkbox" name="calcados"> Calçados
                <br>
                <input type="checkbox" name="acessorios">Acessórios
                <br> <br>

                <span class="titulopesq">Categorias</span>
                <br>
                <input type="checkbox" name="feminino">Feminino
                <br>
                <input type="checkbox" name="masculino">Masculino
                <br>
                <input type="checkbox" name="infantil">Infantil
                <br>
                <input type="checkbox" name="unissex">Unissex
                <br> <br>

                <span class="titulopesq">Marcas</span>
                <br>
                <input type="checkbox" name="adidas">Adidas
                <br>
                <input type="checkbox" name="nike" >Nike
                <br>
                <input type="checkbox" name="vans">Vans
                <br>
                <br>
                <input type="submit" id="filtrar" name="filtrar" value="Filtrar">
            </form>
        </div>
    
        <div id="produtos">
            <?php
            $conectar = mysqli_connect("localhost","root","", "loja");

            if (isset($_POST['filtrar'])) {
                $sql = "SELECT * FROM produto WHERE 1";

                $categorias = array();
                if (isset($_POST['masculino'])) {
                    array_push($categorias, "codcategoria = 1");
                }
                if (isset($_POST['feminino'])) {
                    array_push($categorias, "codcategoria = 2");
                }
                if (isset($_POST['infantil'])) {
                    array_push($categorias, "codcategoria = 3");
                }
                if (isset($_POST['unissex'])) {
                    array_push($categorias, "codcategoria = 4");
                }
                if (count($categorias) > 0) {
                    $sql .= " AND (" . implode(" OR ", $categorias) . ")";
                }

                $marcas = array();
                if (isset($_POST['nike'])) {
                    array_push($marcas, "codmarca = 1");
                }
                if (isset($_POST['adidas'])) {
                    array_push($marcas, "codmarca = 2");
                }
                if (isset($_POST['vans'])) {
                    array_push($marcas, "codmarca = 3");
                }
                if (count($marcas) > 0) {
                    $sql .= " AND (" . implode(" OR ", $marcas) . ")";
                }

                $tipos = array();
                if (isset($_POST['roupas'])) {
                    array_push($tipos, "codtipo = 1");
                }
                if (isset($_POST['calcados'])) {
                    array_push($tipos, "codtipo = 2");
                }
                if (isset($_POST['acessorios'])) {
                    array_push($tipos, "codtipo = 3");
                }
                if (count($tipos) > 0) {
                    $sql .= " AND (" . implode(" OR ", $tipos) . ")";
                }
                $resultado = mysqli_query($conectar, $sql);

                if ($resultado && mysqli_num_rows($resultado) > 0) {
                    while ($dados = mysqli_fetch_object($resultado)) {
                        
                        
                        echo    '<div class="resultado">';
                        echo        '<div class="imgs">';
                        echo            "<img src='fotos banco/{$dados->foto1}' width='45%' class='img'>
                                        <img src='fotos banco/{$dados->foto2}' width='45%' class='img'>";
                        echo        '</div>';
                        echo        '<div class="texto">';
                        echo            "<span>{$dados->descricao}</span> <br>
                                        <span>Tamanho {$dados->tamanho} | Cor {$dados->cor} <br>
                                        <span>R$ {$dados->preco}</span>";
                        echo        '</div>';
                        echo    '</div>';
                        
                    }
                } else {
                    echo "<div class='resultado'>Nenhum produto encontrado!</div>";
                }
            } else {
                echo '<div class="produto">
                        <div class=fotos>
                            <img src="/imagens/top 1/top1.avif" class="foto"> <br>
                        </div>
                        <span>Top Adidas Feminino</span> <br>
                        <span>R$129,99</span>
                    </div>
                    <div class="produto">
                        <div class=fotos>
                            <img src="/imagens/tenis 1/nike1.avif" class="foto"> <br>
                        </div>
                        <span>Tenis Nike Masculino</span> <br>
                        <span>R$279,99</span>
                    </div>
                    <div class="produto">
                        <div class=fotos>
                            <img src="/imagens/mochila 1/mochila1.avif" class="foto"> <br>
                        </div>
                        <span>Mochila Adidas Clássica</span> <br>
                        <span>R$120,00</span>
                    </div>
                    <div class="produto">
                        <div class=fotos>
                            <img src="/imagens/shorts 1/shorts1.webp" class="foto"> <br>
                        </div>
                        <span>Shorts Adidas Masculino</span> <br>
                        <span>R$139,99</span>
                    </div>
                    <div class="produto">
                        <div class=fotos>
                            <img src="/imagens/shorts 2/shorts1.webp" class="foto"> <br>
                        </div>
                        <span>Shorts Nike Feminino</span> <br>
                        <span>R$95,50</span>
                    </div>
                    <div class="produto">
                        <div class=fotos>
                            <img src="/imagens/camiseta infantil 1/camisetainfantil1.avif" class="foto"> <br>
                        </div>
                        <span>Camiseta Infantil Nike</span> <br>
                        <span>R$80,99</span>
                    </div>
                    <div class="produto">
                        <div class=fotos>
                            <img src="/imagens/bone 1/bonevans.webp" class="foto"> <br>
                        </div>    
                        <span>Boné Vans</span> <br>
                        <span>R$179,99</span>
                    </div>
                    <div class="produto">
                        <div class=fotos>
                            <img src="/imagens/tenis 3/tenisvans.avif" class="foto"> <br>
                        </div>    
                        <span>Tênis Vans Feminino</span> <br>
                        <span>R$494,99</span>
                    </div>';
            }
            ?>
        </div>
    </div>

</body>
</html>