<?php

class ModelComents{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=productoskc;charset=utf8', 'root', '');
    }

    function getComments($id){
        $sentencia = $this->db->prepare( "SELECT * FROM comentarios WHERE id_componente = ?");
        $sentencia->execute([$id]);
        $comentarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $comentarios;
    }

    function getComentario($id){
        $sentencia = $this->db->prepare( 'SELECT * FROM comentarios WHERE id = ?');
        $sentencia->execute([$id]);
        $comentario = $sentencia->fetch(PDO::FETCH_OBJ);
        
        return $comentario;
    }

    function addComment($id, $texto, $puntaje,$user){
        $sentencia = $this->db->prepare("INSERT INTO comentarios(id_componente, texto,user_coment,puntaje) VALUES(?,?,?,?)");
        $sentencia->execute(array($id,$texto,$user,$puntaje));
        return $this->db->lastInsertId();
    }

    function deleteComment($id){
        $sentencia = $this->db->prepare("DELETE FROM comentarios WHERE id=?");
        $sentencia->execute(array($id));
    }

    function getCommentsByRate($puntaje,$id){
        $sentencia = $this->db->prepare( "SELECT * FROM comentarios WHERE puntaje = ? AND id_componente = ?");
        $sentencia->execute(array($puntaje,$id));
        $comentarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $comentarios;
    }
}