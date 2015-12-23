<?php

class Pessoa{
	
	public $id;
	public $nome;
	public $sobrenome;
	public $email;
	public $telefone;
	public $celular;
	public $sexo;

	private	function conectar(){
           
		$user='root';
		$pass='admin';
		$host='127.0.0.1';
		$port='3306';
		$banco='php';
			
		$pdo = new 	PDO("mysql:host=$host;port=$port;dbname=$banco", $user, $pass);
	
		return $pdo;
	
	}
	
	public function adicionar(){
	
		$pdo = $this->conectar();
	
		$stmt = $pdo->prepare("INSERT INTO pessoas (nome,sobrenome,email,telefone,celular,sexo) VALUES (?, ?,?,?,?,?)");	
		
		$stmt->bindParam(1,$this->nome);
		$stmt->bindParam(2,$this->sobrenome);
		$stmt->bindParam(3,$this->email);	
		$stmt->bindParam(4,$this->telefone);	
		$stmt->bindParam(5,$this->celular);	
		$stmt->bindParam(6,$this->sexo);	
	
		$stmt->execute();
		
		return $pdo->lastInsertId();
	}
	
	public function editar($id){
			
		$pdo = $this->conectar();
	
		$stmt = $pdo->prepare("UPDATE pessoas SET nome=:nome,sobrenome=:sobrenome,email=:email,telefone=:telefone,celular=:celular,sexo=:sexo WHERE id = :id)");	
	
		$stmt->bindParam(':nome',$this->nome);
		$stmt->bindParam(':sobrenome',$this->sobrenome);
		$stmt->bindParam(':email',$this->email);	
		$stmt->bindParam(':telefone',$this->telefone);	
		$stmt->bindParam(':celular',$this->celular);	
		$stmt->bindParam(':sexo',$this->sexo);	
	
		$stmt->bindParam(':id',$id);	
	
		return $stmt->execute();
	}
	
	public function excluir(){
	
		$pdo = $this->conectar();
	
		$stmt = $pdo->prepare("DELETE FROM pessoas WHERE id=:id");

		$stmt->bindParam(':id',$id);	
	
		return $stmt->execute();
}
	
	public function carregar($id){

		$pdo = $this->conectar();
		
		$recordset = $pdo->query("SELECT * FROM pessoas WHERE id = $id ", PDO::FETCH_OBJ);

		var_dump($recordset);
	    
		//$this->nome      = $recordset[0]->nome;
	    //$this->sobrenome = $recordset[0]->sobrenome;
	    //$this->email     = $recordset[0]->email;
	    //$this->telefone  = $recordset[0]->telefone;
	    //$this->celular   = $recordset[0]->celular;
	    //$this->sexo      = $recordset[0]->sexo;
	
	}
	
	public function buscar(){
		
		
	}
	
}
