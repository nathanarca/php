<?php

require_once('pessoa.php');

	$pessoa = new Pessoa;
	
	$pessoa->carregar(1);

	var_dump($pessoa);