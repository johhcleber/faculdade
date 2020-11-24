<?php

// sistema de Gerenciamento de funcionários utilizando estrutura de dados lista encadeada

Class No{

	// atributos do funcionario;
	public $nome;
	public $cargo;
	public $matricula;

	//atributo indicando o proximo nó
	public $prox;

	function __constructor(){
		$this->value = null;
		$this->prox = null;
	}

}

$sistemaFuncionario = new No(); // Instancia da Classe No

// funtion que insere novo funcinario
function insereFuncionario($sistemaFuncionario, string $nome, string $cargo, int $matricula) {

	$primeiro = new No();
	$primeiro->nome = $nome;
	$primeiro->cargo = $cargo;
	$primeiro->matricula = $matricula;

	$primeiro->prox = $sistemaFuncionario;

	return $primeiro;
}

// function que imprime todos os Funcionarios
function imprimeFuncionario($sistemaFuncionario) {
	$p = $sistemaFuncionario;
	while ($p != null) {
		echo "Nome do Funcionario: " . $p->nome . " - ";
		echo "Cargo do Funcionario: " . $p->cargo . " - ";
		echo "Matricula do Funcionario: " . $p->matricula . " - " . "<br><hr>";

		$p = $p->prox;
	}
}

// function que remove um Funcionario
function removeFuncionario($sistemaFuncionario, $matricula)  {

	$p = $sistemaFuncionario;
	$ant = null;

	while ($p != null) {
		if ($p->matricula != $matricula) {
			$ant = $p;
			$p = $p->prox;
		}else{
			$ant->prox = $p->prox;
			unset($p);
			return $sistemaFuncionario;
		}
	}
	return $sistemaFuncionario;
}


#------------------------------------------------------------------------------------#

/**
*	inserindo funcionarios usando a function de inserir funcionarios
*/

$sistemaFuncionario = insereFuncionario($sistemaFuncionario, 'lucas', 'desenvolvedor', 1);
$sistemaFuncionario = insereFuncionario($sistemaFuncionario, 'lucas leite', 'professor', 2);
$sistemaFuncionario = insereFuncionario($sistemaFuncionario, 'alex', 'gerenciador de banco de dados', 3);
$sistemaFuncionario = insereFuncionario($sistemaFuncionario, 'john', 'analista de sistemas', 4);

/**
*	imprimindo funcionarios
*/

imprimeFuncionario($sistemaFuncionario);

echo "<br><hr>";

/**
*	removendo funcionario 3 e depois imprimindo todos os funcionarios
*/

$sistemaFuncionario = removeFuncionario($sistemaFuncionario, 3);

imprimeFuncionario($sistemaFuncionario);
?>