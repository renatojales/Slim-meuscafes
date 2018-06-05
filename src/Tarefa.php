<?php
include_once "DB.php";

class Tarefa extends DB
{

   public function listar() {
       $sql = "SELECT * FROM tarefa";
       $stmt = $this->db->prepare($sql);
       $stmt->execute();
       $tarefas = $stmt->fetchAll(PDO::FETCH_CLASS);
       return $tarefas;
   }

   public function incluir($tarefa) {
       $sql = "INSERT INTO tarefa (titulo, descricao) VALUES (:titulo, :descricao)";
       $stmt = $this->db->prepare($sql);
       $stmt->bindParam("titulo", $tarefa->titulo);
       $stmt->bindParam("descricao", $tarefa->descricao);
       $insert = $stmt->execute();
       return $insert;
   }

   public function alterar($tarefa) {
       $sql = "UPDATE tarefa SET titulo=:titulo, descricao=:descricao WHERE id=:id";
       $stmt = $this->db->prepare($sql);
       $stmt->bindParam("titulo", $tarefa->titulo);
       $stmt->bindParam("descricao", $tarefa->descricao);
       $stmt->bindParam("id", $tarefa->id);
       $update = $stmt->execute();
       return $update;
   }

	public function excluir($id) {
	   $sql = "DELETE FROM tarefa WHERE id=:id";
       $stmt = $this->db->prepare($sql);
       $stmt->bindParam("id", $id);
       $delete = $stmt->execute();
	   return $delete;
   }

}
