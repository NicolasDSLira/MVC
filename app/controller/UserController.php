<?php
namespace app\controller;

session_start();

use app\core\Controller;
use app\model\UserModel;
use app\classes\Input;

class UserController extends Controller
{

	private $UserModel;

	// variavel de verrificação
	private $idGet;
	private $emailGet;
	private $passGet;
	private $nameGet;

	public function __construct()
	{
		$this->UserModel = new UserModel();
	}

	public function login()
	{
		$user = $this->getInput();
		

		if($this->validate($user)){
			redirect(BASE.'login/f');
			die();
		}

		if (!$this->UserModel->getByEmail(Input::post('email'))) {
			redirect(BASE.'login/f');
			die();
		}

		$array = $this->UserModel->getByEmail(Input::post('email'));

		if (!$array['email']) {
			redirect(BASE.'login/f');
			die();
		}

		$this->emailGet = $array["email"];
		$this->passGet  = $array["pass"];
		$this->nameGet  = $array["nome"];
		$this->idGet    = $array["id"];

		if ($this->emailGet == Input::post('email')) {
			if ($this->passGet == Input::post('pass')) {
				$_SESSION['nameUser'] = $this->nameGet;
				$_SESSION['idUser'] = $this->idGet;
				$_SESSION['emailUser'] = $this->emailGet;
				$_SESSION['pass_user'] = $this->passGet;
				redirect(BASE.'loading/machine');
			}
		}

		 redirect(BASE.'login/f');
	}



	public function update()
	{
		$this->idGet = $_SESSION['idUser'];

		$vq = $this->UserModel->update($this->updateInput());

		// verifica se foi o update

		if($vq != 1)
			return redirect(BASE.'dashboard/alterar'); // Em caso de erro volta pra base

		$_SESSION['nameUser'] = Input::post('updateName');

		// Verifica se o usuario trocou de email ou senha

		if ($_SESSION['emailUser'] != Input::post('updateEmail') || $_SESSION['pass_user'] != Input::post('updatePassword')){
			// Em caso de troca de email ou senha, destroi a session e vai pra base
			session_destroy();
			redirect(BASE);
		}

		redirect(BASE.'dashboard/alterar');

	}

	public function singOut(){
		session_destroy();

		redirect(BASE);
		exit;
	}

	private function updateInput(){
		return (object)[
			'id'    =>  $_SESSION['idUser'],
			'nome'  =>  Input::post('updateName'),
			'email' =>  Input::post('updateEmail'),
			'senha' => 	Input::post('updatePassword')
		];
	}

	private function getInput(){
		return (object)[
			'emailUser' => Input::post('email'),
			'passUser'  => Input::post('pass')
		];
	}

	private function validate($params){
			if (strlen($params->emailUser) < 3){
				return true;
			}
		}

	
}