<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->add(function ($req, $res, $next) {
   $response = $next($req, $res);
   return $response
           ->withHeader('Access-Control-Allow-Origin', 'http://localhost:4200')
           ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
           ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

$app->get('/tarefas', function() {
    $sql = "SELECT * FROM tarefa";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $tarefas = $stmt->fetchAll();
    var_dump($tarefas);
});