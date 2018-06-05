<?php
// DIC configuration

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

/*
// PDO database library
$container['db'] = function ($c) {
   $settings = $c->get('settings')['db'];
   $dsn = "mysql:dbname=" . $settings['database'] . ";host=" . $settings['host'];
   $pdo = new PDO($dsn, $settings['username'], $settings['password'], [
      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"
   ]);
   return $pdo;
};
*/

/*
$container['db'] = function ($c) {
    //$db = $c('settings')['dbcon'];
   // $pdo = new PDO("mysql:host=" . $db['host'] . ";dbname=" . $db['dbname'], $db['usuario'], $db['senha']);
     $username = "root";
     $password = "12345";
     $pdo = new PDO('mysql:host=localhost:3306;dbname=tarefas', $username, $password);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
     return $pdo;
 };
 */

$container['db'] = function ($c) {
    $settings = $c->get('settings')['db'];
    $dsn = "mysql:host=".$settings['host'].";dbname=".$settings['database'];
    $pdo = new PDO($dsn, $settings['username'], $settings['password'], $settings['options']);
    return $pdo;
 };