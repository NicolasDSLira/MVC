<?php
namespace app\controller;

session_start();

use app\core\Controller;
use app\model\MachineModel;
use app\classes\Input;

class MachineController extends Controller
{

	private $MachineModel;

	// variavel de verrificação
	private $idGet;
	private $nameGet;
	private $descGet;
	private $URLImgGet;
	private $idUserGet;

	public function __construct()
	{
		$this->MachineModel = new MachineModel();
	}

	public function viewMachine()
	{
		$session = $_SESSION['nameUser'];

		if ($session == "not")
			redirect(BASE);

		$valueNull = "Sem registros";

		$this->idUserGet = $_SESSION['idUser'];	

		if($this->idUserGet == null)
				return $valueNull;
		

		$array = $this->MachineModel->getUserId($this->idUserGet);


		if (!$array[0]['nome'])
			return $valueNull;
		

		$_SESSION['MachineArray'] = $array;

		redirect(BASE.'dashboard');
	
		
	}

	public function insert(){
		$session = $_SESSION['nameUser'];
		if ($session == "not")
			redirect(BASE);

		$this->idUserGet =  $_SESSION['idUser'];

		$add = $this->MachineModel->insert($this->getInput());

	}

	private function getInput(){
		return (object)[
			'nomeMachine' => Input::post('name'),
			'descript'    => Input::post('descript'),
			'URLImage'    => Input::post('urlImg'),
			'IDUser'      => $this->idUserGet
		];
	}

	// private function validate($params){
	// 		if (!$params->emailUser) < 3){
	// 			return true;
	// 		}
	// 	}

	
}