<?php

use \Hcode\PageAdmin;
use \Hcode\Model\User;

$app->get('/admin', function() { //admin

	User::verifyLogin();
    
	$page = new PageAdmin();

	$page->setTpl("index");

});

$app->get('/admin/login', function() { //login
    // criar um array para desabilitar o header e footer padrao
	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("login");

});

$app->post('/admin/login', function() { // apos informar os dados de login e password

	User::login($_POST["login"], $_POST["password"]);

	header("Location: /admin");
	exit;

});

$app->get('/admin/logout', function() { // rota para deslogar o usuario do painel admin

	User::logout();

	header("Location: /admin/login");
	exit;

});

?>