<?php

use Slim\Http\Request;
use Slim\Http\Response;

include_once "Tarefa.php";

// Routes

$app->add(function ($req, $res, $next) {
   $response = $next($req, $res);
   return $response
           ->withHeader('Access-Control-Allow-Origin', 'http://localhost:4200')
           ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
           ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});


$app->get('/tarefas', function (Request $request, Response $response, array $args) {
   $tarefa = new Tarefa($this->db);
   $tarefas = $tarefa->listar();
   return $this->response->withJson($tarefas, null, JSON_UNESCAPED_UNICODE);
});

$app->post('/incluirTarefa', function (Request $request, Response $response, array $args) {
   $tarefa = json_decode($request->getBody());
   $t = new Tarefa($this->db);
   $incluido = $t->incluir($tarefa);

   if ($incluido) {
     $retorno = ['status' => 'ok', 'mesagem' => 'Tarefa incluida com sucesso.'];
   } else {
   	 $retorno = ['status' => 'erro', 'mesagem' => 'Erro ao incluir a tarefa.'];
   }

   return $this->response->withJson($retorno, null, JSON_UNESCAPED_UNICODE);
});

$app->post('/alterarTarefa', function (Request $request, Response $response, array $args) {
   $tarefa = json_decode($request->getBody());
   $t = new Tarefa($this->db);
   $alterado = $t->alterar($tarefa);

   if ($alterado) {
     $retorno = ['status' => 'ok', 'mesagem' => 'Tarefa alterada com sucesso.'];
   } else {
   	 $retorno = ['status' => 'erro', 'mesagem' => 'Erro ao alterar a tarefa.'];
   }

   return $this->response->withJson($retorno, null, JSON_UNESCAPED_UNICODE);
});

$app->get('/excluirTarefa/{id}', function (Request $request, Response $response, array $args) {
   $id = $args['id'];
   $t = new Tarefa($this->db);
   $excluido = $t->excluir($id);
   if ($excluido) {
     $retorno = ['status' => 'ok', 'mesagem' => 'Tarefa excluida com sucesso.'];
   } else {
   	 $retorno = ['status' => 'erro', 'mesagem' => 'Erro ao excluir a tarefa.'];
   }

   return $this->response->withJson($retorno, null, JSON_UNESCAPED_UNICODE);
});