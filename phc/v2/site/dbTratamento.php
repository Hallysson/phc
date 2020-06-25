<?php
	require 'pgsql_conexao.php';

	class Tratamento{

		private $id;
		private $tratamento;

		private $db;

		public function __construct($i = ''){
			
			try {
				$this->pdo = new PDO("pgsql:dbname=dbPHC;host=localhost;port=5432", 'postgres', 'postgres');
				$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);				
			}catch(PDOException $e){
				echo "Conexao falhou: ".$e->getMessage();
			}
			
			//$this->db = new PgsqlConexao("localhost", "dbEstudos", "postgres", "postgres");
			if (!empty($i)) { echo "Selecionar...<br/>";
				$sql = 'SELECT * FROM "tbltratamentomaconico" WHERE id = ?';
				$sql = $this->pdo->prepare($sql);
				$sql->execute(array($i));

				if ($sql->rowCount() > 0) {
					$data = $sql->fetch();

					$this->id = $data['id'];
					$this->tratamento = $data['tratamento'];
				}
			}
		}

		public function getId(){
			return $this->id;
		}

		public function getLogin(){
			return $this->login;
		}

		public function setTratamento($t){
			$this->tratamento = $t;
		}

		public function getTratamento(){
			return $this->tratamento;
		}

		public function salvar(){
			if (!empty($this->id)) { echo "Alterar...<br/>";
				$sql = 'UPDATE "tbltratamentomaconico" SET 
					tratamento = ?
					WHERE id = ?';
				$sql = $this->pdo->prepare($sql);
				$sql->execute(array(
					$this->tratamento,
					$this->id));
			} else { echo "Inserir...<br/>";
				$sql = 'INSERT INTO "tbltratamentomaconico" (tratamento) VALUES(?)';
				$sql = $this->pdo->prepare($sql);
				$sql->execute(array(
					$this->tratamento));
			}
		}

		public function delete(){ echo "Deletar...<br/>";
			$sql = 'DELETE FROM "tbltratamentomaconico" WHERE id = ?';
			$sql = $this->pdo->prepare($sql);
			$sql->execute(array($this->id));
		}
	}
?>