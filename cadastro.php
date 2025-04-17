<?php
//* conectar c banco
$conectar = mysql_connect("localhost","root","");
$banco = mysql_select_db("loja");

//* verificar opcao do user (botao)

//! marca
//? is set - se pressionado
if (isset($_POST["salvarmarca"])){
    $codigomarca = $_POST["codigomarca"];
    $nomemarca = $_POST["nomemarca"];

    //* comando sql pra salvar banco
    $sql = "insert into marca (codigo, nome) values ('$codigomarca','$nomemarca')";

    //* comando php pra executar sql no banco
    $resultado = mysql_query($sql);

    if ($resultado == TRUE){
        echo "Dados da marca gravados com sucesso!";
    }
    else {
        echo "Erro ao gravar dados da marca";
    }
}

if (isset($_POST["alterarmarca"])){
    $codigomarca = $_POST["codigomarca"];
    $nomemarca = $_POST["nomemarca"];

    $sql = "update marca set nome='$nomemarca' where codigo='$codigomarca'";

    $resultado = mysql_query($sql);

    if ($resultado == TRUE){
        echo "Dados da marca alterados com sucesso!";
    }
    else {
        echo "Erro ao alterar dados da marca";
    }
}

if (isset($_POST["excluirmarca"])){
    $codigomarca = $_POST["codigomarca"];

    $sql = "delete from marca where codigo='$codigomarca'"; //vai da erro as vezes pq ta sendo usado como chave estrangeira

    $resultado = mysql_query($sql);

    if ($resultado == TRUE){
        echo "Dados da marca excluidos com sucesso!";
    }
    else {
        echo "Erro ao excluir dados da marca";
    }
}

if (isset($_POST["pesquisarmarca"])){
    $codigomarca = $_POST["codigomarca"];
    $sql = mysql_query("select * from marca where codigo='$codigomarca'");

    if (mysql_num_rows($sql) == 0)
        {echo "Desculpe, mas sua pesquisa nao encontrou resultados.";}
    else
        {
        echo "<h3>Marcas cadastradas: </h3>";
        while ($dados = mysql_fetch_object($sql)){
            echo "Codigo: ".$dados->codigo."<br>";
            echo "Nome: ".$dados->nome."<br>";
        }
    }
}


//! categoria
if (isset($_POST["salvarcategoria"])){
    $codigocategoria = $_POST["codigocategoria"];
    $nomecategoria = $_POST["nomecategoria"];

    //* comando sql pra salvar banco
    $sql = "insert into categoria (codigo, nome) values ('$codigocategoria','$nomecategoria')"; 

    //* comando php pra executar sql no banco
    $resultado = mysql_query($sql);

    if ($resultado == TRUE){
        echo "Dados da categoria gravados com sucesso!";
    }
    else {
        echo "Erro ao gravar dados da categoria";
    }
}

if (isset($_POST["alterarcategoria"])){
    $codigocategoria = $_POST["codigocategoria"];
    $nomecategoria = $_POST["nomecategoria"];

    $sql = "update categoria set nome='$nomecategoria' where codigo='$codigocategoria'";

    $resultado = mysql_query($sql);

    if ($resultado == TRUE){
        echo "Dados da categoria alterados com sucesso!";
    }
    else {
        echo "Erro ao alterar dados da categoria";
    }
}

if (isset($_POST["excluircategoria"])){
    $codigocategoria = $_POST["codigocategoria"];

    $sql = "delete from categoria where codigo='$codigocategoria'"; 

    $resultado = mysql_query($sql);

    if ($resultado == TRUE){
        echo "Dados da categoria excluidos com sucesso!";
    }
    else {
        echo "Erro ao excluir dados da categoria";
    }
}

if (isset($_POST["pesquisarcategoria"])){
    $codigocategoria = $_POST["codigocategoria"];
    $sql = mysql_query("select * from categoria where codigo='$codigocategoria'");

    if (mysql_num_rows($sql) == 0)
        {echo "Desculpe, mas sua pesquisa nao encontrou resultados.";}
    else
        {
        echo "<h3>Categorias cadastradas: </h3>";
        while ($dados = mysql_fetch_object($sql)){
            echo "Codigo: ".$dados->codigo."<br>";
            echo "Nome: ".$dados->nome."<br>";
        }
    }
  
}

//! tipo
if (isset($_POST["salvartipo"])){
    $codigotipo = $_POST["codigotipo"];
    $nometipo = $_POST["nometipo"];

    //* comando sql pra salvar banco
    $sql = "insert into tipo (codigo, nome) values ('$codigotipo','$nometipo')";

    //* comando php pra executar sql no banco
    $resultado = mysql_query($sql);

    if ($resultado == TRUE){
        echo "Dados do tipo gravados com sucesso!";
    }
    else {
        echo "Erro ao gravar dados do tipo";
    }
}

if (isset($_POST["alterartipo"])){
    $codigotipo = $_POST["codigotipo"];
    $nometipo = $_POST["nometipo"];

    $sql = "update tipo set nome='$nometipo' where codigo='$codigotipo'";

    $resultado = mysql_query($sql);

    if ($resultado == TRUE){
        echo "Dados do tipo alterados com sucesso!";
    }
    else {
        echo "Erro ao alterar dados do tipo";
    }
}

if (isset($_POST["excluirtipo"])){
    $codigotipo = $_POST["codigotipo"];

    $sql = "delete from tipo where codigo='$codigotipo'"; //vai da erro as vezes pq ta sendo usado como chave estrangeira

    $resultado = mysql_query($sql);

    if ($resultado == TRUE){
        echo "Dados do tipo excluidos com sucesso!";
    }
    else {
        echo "Erro ao excluir dados do tipo";
    }
}

if (isset($_POST["pesquisartipo"])){
    $codigotipo = $_POST["codigotipo"];
    $sql = mysql_query("SELECT * from tipo where codigo='$codigotipo'");

    if (mysql_num_rows($sql) == 0)
          {echo "Desculpe, mas sua pesquisa nao encontrou resultados.";}
    else
        {
        echo "<h3>Tipos cadastrados: </h3>";
        while ($dados = mysql_fetch_object($sql)){
            echo "Codigo: ".$dados->codigo."<br>";
            echo "Nome: ".$dados->nome."<br>";
        }
    }
}


//! produto
//? is set - se pressionado
if (isset($_POST["salvarproduto"])){
    $codigoproduto = $_POST["codigoproduto"];
    $descricaoproduto = $_POST["descricaoproduto"];
    $corproduto = $_POST["corproduto"];
    $tamanhoproduto = $_POST["tamanhoproduto"];
    $precoproduto = $_POST["precoproduto"];
    $codmarca = $_POST["codmarca"];
    $codcategoria = $_POST["codcategoria"];
    $codtipo = $_POST["codtipo"];
    //*arquivos imagens
    $foto1 = $_FILES["foto1"];
    $foto2 = $_FILES["foto2"];

    //*criar pasta e mover arquivos img
    $diretorio = "fotos banco/";  //! ver nome disso aq

    //* mudar nome fotos (1 e 2)
    $extensao1 = strtolower(substr($_FILES['foto1']['name'], -4));
    $novo_nome1 = md5(time().$extensao1);    //* gera nome aleatorio
    move_uploaded_file($_FILES['foto1']['tmp_name'], $diretorio.$novo_nome1);

    $extensao2 = strtolower(substr($_FILES['foto2']['name'], -6));
    $novo_nome2 = md5(time().$extensao2);
    move_uploaded_file($_FILES['foto2']['tmp_name'], $diretorio.$novo_nome2); 

    //* comando sql pra salvar banco
    $sql = "insert into produto (codigo, descricao, cor, tamanho, preco, codmarca, codcategoria, codtipo, foto1, foto2) values ('$codigoproduto','$descricaoproduto', '$corproduto', '$tamanhoproduto', '$precoproduto','$codmarca','$codcategoria','$codtipo','$novo_nome1','$novo_nome2')";

    //* comando php pra executar sql no banco
    $resultado = mysql_query($sql);

    if ($resultado == TRUE){
        echo "Dados do produto gravados com sucesso!";
    }
    else {
        echo "Erro ao gravar dados do produto";
    }
}

if (isset($_POST["alterarproduto"])){
    $codigoproduto = $_POST["codigoproduto"];
    $descricaoproduto = $_POST["descricaoproduto"];
    $corproduto = $_POST["corproduto"];
    $tamanhoproduto = $_POST["tamanhoproduto"];
    $precoproduto = $_POST["precoproduto"];

    
    $sql = "update produto set descricao='$descricaoproduto', cor='$corproduto', tamanho='$tamanhoproduto', preco='$precoproduto'  where codigo='$codigoproduto'";

    $resultado = mysql_query($sql);

    if ($resultado == TRUE){
        echo "Dados do produto alterados com sucesso!";
    }
    else {
        echo "Erro ao alterar dados do produto";
    }
}

if (isset($_POST["excluirproduto"])){
    $codigoproduto = $_POST["codigoproduto"];

    $sql = "delete from produto where codigo='$codigoproduto'"; //vai da erro as vezes pq ta sendo usado como chave estrangeira

    $resultado = mysql_query($sql);

    if ($resultado == TRUE){
        echo "Dados do produto excluidos com sucesso!";
    }
    else {
        echo "Erro ao excluir dados do produto";
    }
}


if (isset($_POST["pesquisarproduto"]))
{
    $codigoproduto = $_POST["codigoproduto"];
    $sql = mysql_query("SELECT * FROM produto WHERE codigo='$codigoproduto'");
    
    if (mysql_num_rows($sql) == 0)
          {echo "Desculpe, mas sua pesquisa nao encontrou resultados.";}
    else
         {
         echo "<b>Produtos Cadastrados:</b><br><br>";
         while ($dados = mysql_fetch_object($sql))
          {
                echo "Codigo    : ".$dados->codigo."<br>";
                echo "Desricao  : ".$dados->descricao."<br>";
                echo "Cor       : ".$dados->cor."<br>";
                echo "Tamanho   : ".$dados->tamanho."<br>";
                echo "Preco     : ".$dados->preco."<br>";
                echo "Marca     : ".$dados->codmarca."<br>";
                echo "Categoria : ".$dados->codcategoria."<br>";
                echo "Tipo      : ".$dados->codtipo."<br>";
                echo '<img src="fotos banco/'.$dados->foto1.'"height="200" width="200" />'."  ";
                echo '<img src="fotos banco/'.$dados->foto2.'"height="200" width="200" />'."<br><br>  ";
         }
      }
 }
?>