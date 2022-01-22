<?php 
function dd($params = [], $die = true)
{
	echo '<pre>';
	print_r($params);
	echo '</pre>';

	if ($die) die();
}


function redirect($url){
	header('Location:'. $url);
	exit;
}