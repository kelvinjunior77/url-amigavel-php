<?php  

try 
{
	$pdo = new PDO("mysql:host=localhost; dbname=impresa", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	return $pdo;
}
catch(PDOException $erro)
{
	echo $erro->getMessage();
}


/**
 * Coloca nome de banco de dados.
 * 
 */

?>
