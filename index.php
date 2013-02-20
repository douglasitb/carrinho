<?php
require "init.php";
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />

<link rel="stylesheet" href="css/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/carrinho.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/produtos.css" type="text/css" media="screen" />

<script type="text/javascript" src="js/default.js"></script>
<script type="text/javascript" src="js/carrinho.js"></script>

<title>Carrinho de Comprasa</title>
</head>
<body>
<div id="topo">
<h1 style="text-align: center;">Carrinho de Compras</h1>
<p style="text-align: center;"> <strong>MYSQL</strong></p>
</div>

<div id="menu">
<ul>
  <li>&middot; <a href="?">P&aacute;gina Inicial</a></li>
  <li>&middot; <a href="?area=produtos">Produtos</a></li>
  <li>&middot; <a href="?area=carrinho">Ver meu Carrinho de Compras</a></li>
</ul>
</div>

<div id="conteudo">
<?php
if (isset ($_GET['area']))
{
	switch ($_GET['area'])
	{
		case "carrinho":
		  include "carrinho.php";
		  break;
		case "produtos":
		  include "produtos.php";
		  break;
		case "finalizar":
		  include "finalizar.php";
		  break;
		default:
		  include "inicial.php";
		  break;
	}
}
else
{
	include "inicial.php";
}
?>
</div>
</body>
</html>