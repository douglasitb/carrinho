<?php
/*
**  Página que exibe todos os produtos do banco de dados
*/
require_once 'conecta_pdo.php';

//$my = new MySQLiConnection();

$sql = "Select * From produtos Order By nome";
$stmtProdutos = $conexao->query($sql);

echo "<p>Total de produtos: <strong>".$stmtProdutos->rowCount()."</strong></p><br />";

echo "
<table width=\"600\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\">";
while ($x = $stmtProdutos->fetch(PDO::FETCH_OBJ))
{
    echo "
	<tr>
      <td width=\"400\" class=\"cel_prods\"><strong>".htmlentities($x->nome)."</strong></td>
      <td width=\"100\" class=\"cel_prods\">R$ <strong>".$x->preco."</strong></td>
      <td width=\"100\" class=\"cel_prods\"><a href=\"?area=carrinho&amp;acao=adicionar&amp;id=".$x->id."\">Comprar</a></td>
    </tr>
    <tr>
      <td colspan=\"3\" class=\"cel_prods\">".nl2br(htmlentities($x->descricao))."</td>
    </tr>
    <tr>
	  <td colspan=\"3\">&nbsp;</td>
	</tr>
    ";	
}
echo "</table>";
?>