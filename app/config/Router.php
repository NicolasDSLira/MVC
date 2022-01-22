<?php

$this->get('/', function(){
	(new \app\controller\MasterController)->home();
});


$this->get('/login', function(){
	(new \app\controller\MasterController)->login();
});

$this->get('/login/f', function(){
	(new \app\controller\MasterController)->loginFailed();
});

$this->get('/dashboard', function(){
	(new \app\controller\MasterController)->dashboard();
});

$this->get('/dashboard/cadastrarMachine', function(){
	(new \app\controller\MasterController)->createMachine();
});

$this->get('/dashboard/profile', function(){
	(new \app\controller\MasterController)->profile();
});

$this->get('/dashboard/alterar', function(){
	(new \app\controller\MasterController)->updateUser();
});


$this->post('/verifica', 'UserController@login');

$this->post('/dashboard/update', 'UserController@update');


$this->post('/hahadabduahd', 'MachineController@viewMachine');

$this->post('/dashboard/machine/create', 'MachineController@insert');

$this->post('/dashboard/sing_out', 'UserController@singOut');






