<?php

use \Hcode\Model\User;
use \Hcode\PageAdmin;

$app->get('/admin/users', function(){ // rota para área de usuarios do painel admin

	User::verifyLogin();

	$users = User::listAll();

	$page = new PageAdmin();

	$page->setTpl("users", array(
		"users"=>$users
	));

});

$app->get('/admin/users/create', function(){ // rota para criacao de novo usuario

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("users-create");

});
// colocar nesta ordem para não se perder na hora de deletar o usuario
$app->get('/admin/users/:iduser/delete', function($iduser) { // metodo post para deletar um usuario

	User::verifyLogin();

	$user = new User();

	$user->get((int)$iduser);

	$user->delete();

	header("Location: /admin/users");
	exit;

});

$app->get('/admin/users/:iduser', function($iduser){ // rota para área de edicao de um usuario ja existente

	User::verifyLogin();

	$user = new User();

	$user->get((int)$iduser);

	$page = new PageAdmin();

	$page->setTpl("users-update", array(
		"user"=>$user->getValues()
	));

});

$app->post('/admin/users/create', function() { // metodo post para criar novo usuario

	User::verifyLogin();

	$user = new User();

	$_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;

	$user->setData($_POST);

	$user->save();

	header("Location: /admin/users");
	exit;

});

$app->post("/admin/users/:iduser", function($iduser) { // metodo post para editar um usuario

	User::verifyLogin();

	$user = new User();

	$_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;

	$user->get((int)$iduser);

	$user->setData($_POST);

	$user->update();	

	header("Location: /admin/users");
	exit;

});

?>