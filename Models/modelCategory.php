<?php

class ModelCategory{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=productoskc;charset=utf8', 'root', '');
    }

    function getCategories(){
        $query = $this->db->prepare( "SELECT * FROM tipo_componente");
        $query->execute();
        $components = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $components;
    }

    function getSpecificCategory($code){
        $query = $this->db->prepare( 'SELECT * FROM tipo_componente WHERE id_tipo = ?');
        $query->execute([$code]);
        $component = $query->fetch(PDO::FETCH_OBJ);
        
        return $component;
    }

    function setCategory($name){
        $query = $this->db->prepare("INSERT INTO tipo_componente(nombre) VALUES(?)");
        $query->execute(array($name));
    }

    function deleteCategory($id){
        $query = $this->db->prepare("DELETE FROM tipo_componente WHERE id_tipo=?");
        $query->execute(array($id));
    }

    function updateCategory($prevName,$newName){
        $query = $this->db->prepare("UPDATE tipo_componente SET nombre=? WHERE nombre=?");
        $query->execute(array($newName,$prevName));
    }
}