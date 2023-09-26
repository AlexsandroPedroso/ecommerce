<?php 

// www.php-commerce.com.br - url de acesso do projeto

session_start();
// iniciando composer
require_once("vendor/autoload.php");
// carrega as classes slim e hcode
use \Slim\Slim;

// chamada das rotas na url para carregar a pagina do site
$app = new Slim();

$app->config('debug', true);

require_once("functions.php");
require_once("site.php");
require_once("admin.php");
require_once("admin-user.php");
require_once("admin-forget.php");
require_once("admin-categories.php");
require_once("admin-products.php");

$app->run();

 ?>