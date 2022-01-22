<?php

namespace app\controller;

use app\core\Controller;


class MessageController extends Controller
{
	public function message($title, $message, $code)
	{

		http_response_code($code);
		$this->load('message/main',[
			'title' => $title,
			'message' => $message
		]);
	}

	
}