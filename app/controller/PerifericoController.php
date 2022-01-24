<?php
namespace app\controller;

session_start();

use app\core\Controller;
use app\model\PerifericoModel;
use app\classes\Input;

class PerifericoController extends Controller
{

	private $PerifericoModel;


	public function __construct()
	{
		$this->PerifericoModel = new PerifericoModel();
	}

	/*
	*
	** Visualizar perifericos antes de entrar na dash
	*
	*/
	

	public function viewPeriferico()
	{
		$session = $_SESSION['nameUser'];

		if ($session == "not")
			redirect(BASE);

		$MachineArray = $_SESSION['MachineArray'];

		if(!$MachineArray)
				return NULL;

		foreach ($MachineArray as $row) 
		{

			$array[] = $this->PerifericoModel->getMachineId($row['id']);
			
		}

		for ($i = 0; $i < count($array) ; $i++) { 
			if(!$array[$i])
				unset($array[$i]);
		}

		$_SESSION['PerifericoArray'] = $array;

		redirect(BASE.'dashboard');
		
	}

	/*
	*
	**	Cria periférico
	*
	*/

	public function insert(){

		$session = $_SESSION['nameUser'];
		if ($session == "not")
			redirect(BASE);

		$add = $this->PerifericoModel->insert($this->getInput());

		if($add == 1)
			redirect(BASE.'loading/periferico');

	}

	/*
	*
	** delete periférico
	*
	*/

	public function delete()
	{

		$session = $_SESSION['nameUser'];
		if ($session == "not")
			redirect(BASE);

		$uri = $_SERVER['REQUEST_URI'];

		if(strpos($uri, '?'))
			$uri = explode('?', $uri);

			$id = $uri[1];

		$del = $this->PerifericoModel->delete($id);

		if($del == 1)
			redirect(BASE.'loading/machine');

	}

	private function getInput(){
		return (object)[
			'nome'   	=> Input::post('name'),
			'descricao' => Input::post('descript'),
			'URLImg' 	=> Input::post('urlImg'),
			'IDMachine' => Input::post('IdMachine')
		];
	}
	
}