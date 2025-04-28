<?php
/**
 * Arquivo responsavel por criar mapeamentos de rotas
 * Deves colocar todos os arquivos da sua pagina aqui, caso necessaria.
 * Lembrando que já contem uma pagina home, na qual é a pagina principal.
 */
function routesURL()
{

	if (isset($_GET['url'])) {

		$url = $_GET['url'] ? $_GET['url'] : "home";
	} else {
		$url = "home";
	}

	switch ($url) {
		case 'home':
			include_once "view/pages/home.php";
			break;


		case 'sobre':
			include_once "view/pages/sobre.php";
			break;


		default:
			include_once "view/pages/404.php";
			break;
	}
}
