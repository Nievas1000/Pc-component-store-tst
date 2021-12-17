<?php

class ModelUser{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=productoskc;charset=utf8', 'root', '');
    }

    function registerUser($email,$name,$password){
        $query = $this->db->prepare("INSERT INTO usuarios(email,nombre,password,admin) VALUES(?,?,?,0)");
        $query->execute([$email,$name,$password]);
    }

    function getUser($email){
        $query = $this->db->prepare( 'SELECT * FROM usuarios WHERE email = ?');
        $query->execute([$email]);
        $user = $query->fetch(PDO::FETCH_OBJ);
        
        return $user;
    }

    function getUsers(){
        $query = $this->db->prepare( 'SELECT usuarios.id_usuario, usuarios.email, usuarios.admin FROM usuarios');
        $query->execute();
        $users = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $users;
    }

    function deleteUser($id){
        $query = $this->db->prepare("DELETE FROM usuarios WHERE id_usuario=?");
        $query->execute(array($id));
    }

    function updateRol($id,$rol){
        $query = $this->db->prepare("UPDATE usuarios SET admin=? WHERE email=?");
        $query->execute(array($rol,$id));
    }
}
