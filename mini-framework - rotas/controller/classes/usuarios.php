<?php  


class Usuario {

	private $pdo;

	//construtor
	public function __construct($dbname, $host, $usuario, $senha) {
		try {
			$this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host, $usuario, $senha);

		} catch (PDOException $e ){
			
			echo "Erro com BD: ".$e->getMessage();

		} catch (Exception $e) {
			echo "Erro: ".$e->getMessage();
		}
	}

//cadastrar
public function cadastrar($nome, $email, $senha)
{

	//verificar se email já foi cadastrado
	$cmd = $this->pdo->prepare("SELECT id FROM usuarios WHERE email = :e");
		$cmd->bindValue(":e",$email);
		$cmd->execute();

		if($cmd->rowCount() > 0) 
		{
			return false;
		}

		else 
		{
			//cadastrar 
			$cmd = $this->pdo->prepare("INSERT INTO usuarios (nome, email, senha) values (:n, :e, :s)");
			$cmd->bindValue(":n",$nome);
			$cmd->bindValue(":e",$email);
			$cmd->bindValue(":s",md5($senha));
			$cmd->execute();
			return true;
		}
}

	//logar 
	public function entrar($email, $senha)
	{

		$cmd = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :e AND senha = :s");
		$cmd->bindValue(":e",$email);
		$cmd->bindValue(":s",md5($senha));
		$cmd->execute();

		// se foi encontrado a pessoa
		if($cmd->rowCount() > 0){

			$dados = $cmd->fetch();
			session_start();

			if($dados['id'] == 1)
			{
				//usuario adm
				$_SESSION['adm'] = 1;
			} 
			else 
			{
				//usuario normal
				$_SESSION['usuario'] = $dados['id'];
			}
			return true; //encontrado

		} else 
		{
			return false; //não encontrada
		}
	}

}

?>