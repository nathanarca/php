<?php

require_once('pessoa.php');

	$pessoa = new Pessoa;
	
	$pessoa->nome      ='Diego';
	$pessoa->sobrenome ='Botelho';
	$pessoa->email     ='dibmartins@gmail.com';
	$pessoa->telefone  ='';
	$pessoa->celular   ='22999474887';
	$pessoa->sexo      ='M';
	
	$adicionada = $pessoa->adicionar();

	
	var_dump($pessoa);

echo $adicionada;
