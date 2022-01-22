<?php
namespace app\controller;

session_start();

use app\core\Controller;
use app\model\LoginModel;
use app\classes\Input;

class ProductController extends Controller
{

	private $ProductController;


	public function __construct()
	{
		$this->ProductController = new LoginModel();
	}

	public function login()
	{
	
		
	}

	private function getInput(){
		return (object)[
			// 'emailUser' => Input::post('email'),
			// 'passUser'  => Input::post('pass')
		];
	}

	private function validate($params){
			// if (strlen($params->emailUser) < 3){
			// 	return true;
			// }
		}

	
}