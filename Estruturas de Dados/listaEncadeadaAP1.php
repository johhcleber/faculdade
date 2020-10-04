<?php

/**
* 	Classe que representa o nó da lista encadeada, onde tem um $attribute sendo
*	o valor do nó e um $prox sendo referencia para o proximo nó em forma de objeto.
*/

Class No{

	public $attribute;
	public $prox;

	function __constructor(){
		$this->attribute = null;
		$this->prox = null;
	}

}




$lista = new No(); //instancia da Classe No
$lista2 = new No(); //instancia da Classe No



/**
*	function que reprsenta a inserção de elemento na lista encadeada.
*/

function insere($lista, int $valor) {

	$primeiro = new No();
	$primeiro->attribute = $valor;
	$primeiro->prox = $lista;

	return $primeiro;
}



/**
*	function que imprime os elementos da lista.
*/

function imprime($lista) {
	$p = $lista;
	while ($p != null) {
		echo $p->attribute . "<br>";
		$p = $p->prox;
	}
}



/**
*	function que busca um valor na lista
*/

function lista_busca($lista, $valor) {

	for ($p = $lista; $p != null; $p = $p->prox) { 
		if ($p->attribute == $valor) {
			return true;
		}
	}
	return false;
}



/**
*	function que remove um elementos da lista
*/

function lista_remove($lista, $valor)  {

	$p = $lista;
	$ant = null;

	while ($p != null) {
		if ($p->attribute != $valor) {
			$ant = $p;
			$p = $p->prox;
		}else{
			$ant->prox = $p->prox;
			unset($p);
			return $lista;
		}
	}
	return $lista;
}




/**
*	function que remove todos os elementos iguais da lista 
*/

function lista_remove_todos($lista, $valor) {

	$p = $lista;
	$ant = null;

	while ($p != null) {
		if ($p->attribute != $valor) {
			$ant = $p;
			$p = $p->prox;
		}else{
			$ant->prox = $p->prox;
			$v = $p;
			$p = $p->prox;
			unset($v);
		}
	}
	return $lista;
}



/**
*	function que remove todos os elementos da lista
*/

function libera_lista($lista) {

	while ($lista != null) {
		$t = $lista;
		$lista = $t->prox;
		unset($t);
	}
	return $lista;
}




/**
*	function insere elementos na lista de forma ordenada
*/

function insere_ordenado($lista, $val){

	$novo = new No();
	$ant = null;
	$p = $lista;

	while (($p != null) && ($p->attribute < $val)) {
		$ant = $p;
		$p = $p->prox;
	}
	$novo->attribute = $val;
	if ($ant == null) {
		$novo->attribute = $lista;
		$lista = $novo;
	}else{
		$novo->prox = $ant->prox;
		$ant->prox = $novo;
	}
	return $lista;
}




/**
*	function imprime elementos da lista em reverso
*/

function imprime_reverso($lista){

	if ($lista != null) {
		imprime_reverso($lista->prox);
		echo $lista->attribute . "<br>";
	}
}



/**
*	function faz analise se duas listas são iguais;
*/

function lista_igual($lista1, $lista2) {

	$p1 = $lista1;
	$p2 = $lista2;

	while (($p1 != null) && ($p2 != null)) {
		if ($p1->attribute != $p2->attribute) {
			return false;
			$p1 = $p1->prx;
			$p2 = $p2->prox;
		}
	}
	if ($p1 == null && $p2 == null) {
		return true;
	}
	return false;
}


/*******************************************************************************
*  							EXECUTANDO FUNCTIONS
********************************************************************************/

/*****************************************************
* INSERINDO ELEMENTOS NA LISTA [5, 9, 9, 9, 9, 8, 2, 3]
******************************************************/

echo "INSERINDO ELEMENTOS NA LISTA [5, 9, 9, 9, 9, 8, 2, 3]:" . "<br>";

$lista = insere($lista, 5);
$lista = insere($lista, 9);
$lista = insere($lista, 9);
$lista = insere($lista, 9);
$lista = insere($lista, 9);
$lista = insere($lista, 8);
$lista = insere($lista, 2);
$lista = insere($lista, 3);

echo "--------------------------------------" . "<br>";

/*****************************************************
* IMPRIMINDO LISTA
******************************************************/
echo "ELEMENTOS DA LISTA:" . "<br>";

imprime($lista);

echo "--------------------------------------" . "<br>";

/*****************************************************
* BUSCA ELEMENTO 6 NA LISTA
******************************************************/
echo "BUSCA ELEMENTO 6 NA LISTA:" . "<br>";

var_dump(lista_busca($lista, 6));

echo "<br>" . "--------------------------------------" . "<br>";

/*****************************************************
* BUSCA ELEMENTO 5 NA LISTA
******************************************************/
echo "BUSCA ELEMENTO 5 NA LISTA:" . "<br>";

var_dump(lista_busca($lista, 5));

echo "<br>" . "--------------------------------------" . "<br>";

/*****************************************************
* REMOVE ELEMENTO 5 NA LISTA
******************************************************/
echo "REMOVE ELEMENTO 5 NA LISTA:";

$lista = lista_remove($lista, 5);

echo "<br>" . "--------------------------------------" . "<br>";

/*****************************************************
* IMPRIMINDO LISTA
******************************************************/
echo "ELEMENTOS DA LISTA:" . "<br>";

imprime($lista);

echo "--------------------------------------" . "<br>";

/*****************************************************
* REMOVE TODOS OS ELEMTNOS IGUAIS A 9 DA LISTA
******************************************************/
echo "REMOVE TODOS OS ELEMTNOS IGUAIS A 9 DA LISTA:" . "<br>";

$lista = lista_remove_todos($lista, 9);

echo "--------------------------------------" . "<br>";

/*****************************************************
* IMPRIMINDO LISTA
******************************************************/
echo "ELEMENTOS DA LISTA:" . "<br>";

imprime($lista);

echo "--------------------------------------" . "<br>";

/*****************************************************
* INSERINDO ELEMENTOS [4 , 9, 7] LISTA DE FORMA ORDENADA
******************************************************/
echo "INSERINDO ELEMENTOS [4 , 7] LISTA DE FORMA ORDENADA:" . "<br>";

$lista = insere_ordenado($lista, 4);
$lista = insere_ordenado($lista, 7);

echo "--------------------------------------" . "<br>";

/*****************************************************
* IMPRIMINDO LISTA
******************************************************/
echo "ELEMENTOS DA LISTA:" . "<br>";

imprime($lista);

echo "--------------------------------------" . "<br>";

/*****************************************************
* IMPRIMINDO LISTA DE FORMA REVERSA
******************************************************/
echo "IMPRIMINDO LISTA DE FORMA REVERSA:" . "<br>";

imprime_reverso($lista);

echo "--------------------------------------" . "<br>";

/*****************************************************
* DELETANTO TODOS OS ELEMENTOS DA LISTA
******************************************************/
echo "DELETANTO TODOS OS ELEMENTOS DA LISTA:" . "<br>";

$lista = libera_lista($lista);

echo "--------------------------------------" . "<br>";

/*****************************************************
* IMPRIMINDO LISTA
******************************************************/
echo "ELEMENTOS DA LISTA:" . "<br>";

imprime($lista);

echo "--------------------------------------" . "<br>";

?>