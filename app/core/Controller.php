<?php 

namespace app\core;


class Controller
{
	protected function load($view, $params = [])
	{
 		require_once '../vendor/autoload.php'; 
		$twig = new \Twig\Environment(
			new \Twig\Loader\FilesystemLoader('../app/view')
		);

		$twig->addGlobal('BASE', BASE);
		$twig->addGlobal('session', $_SESSION);
		echo $twig->render($view.'.twig.php', $params);

	}

}