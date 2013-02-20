<?php
/*
 Retorna um array com os pares chave => vaor da variável $_SESSION['carrinho']

Exemplo:

$_SESSION['carrinho'][0]['id'] = 4
$_SESSION['carrinho'][1]['id'] = 10
$_SESSION['carrinho'][2]['id'] = 2

$x = ArrayCarrinho();
print_r ($x);

[0] => 4
[1] => 10
[2] => 2

*/
function ArrayCarrinho()
{
	if (!isset($_SESSION['carrinho']) || !is_array($_SESSION['carrinho']) || (count ($_SESSION['carrinho']) == 0))
	    return array();
	    
	$cods = array();
	$carro = isset($_SESSION['carrinho']) ? $_SESSION['carrinho'] : array();
	foreach ($carro as $k => $v)
    {
	    $cods[$k] = $v['id'];
    }
    return $cods;
}
?>