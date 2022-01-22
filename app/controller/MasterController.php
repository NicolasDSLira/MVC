<?php

namespace app\controller;

session_start();


use app\core\Controller;


class MasterController extends Controller
{
	public function home()
	{
		$this->load('home/main', [
			'Page' => 'Home'
		]);
	}

	public function login()
	{
		$this->load('login/main', [
			'Page' => 'Login'
		]);
	}

	public function loginFailed()
	{
		$this->load('login/errolog', [
			'Page' => 'Login'
		]);
	}

	public function dashboard()
	{
	
		if (!$_SESSION['nameUser'])
			redirect(BASE);
	
		$this->load('dashboard/main', [
			'Page' => 'dashboard'
		]);
	}

	public function profile()
	{
	
	if (!$_SESSION['nameUser'])
			redirect(BASE);
	
		$this->load('dashboard/profile', [
			'Page' => 'profile'
		]);
	}

	public function updateUser()
	{
		if (!$_SESSION['nameUser'])
			redirect(BASE);

		$this->load('dashboard/update', [
			'Page' => 'update'
		]);
	}


	public function createMachine(){
		$this->load('dashboard/machine/create', [
			'Page' => 'dashboard'
		]);
	}


}