<?php

class ModelProducts{

    private $db;
    const PRODUCTXPAGE = 4;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=productoskc;charset=utf8', 'root', '');
    }

    function getAllProducts(){
        $query = $this->db->prepare( "SELECT *
                                          FROM componentes
                                          INNER JOIN tipo_componente ON componentes.id_tipo = tipo_componente.id_tipo");
        $query->execute();
        $product = $query->fetchAll(PDO::FETCH_OBJ);

        return $product;
    }

    function getProductByCat($code){
        $query = $this->db->prepare( 'SELECT * FROM componentes WHERE id_tipo = ?');
        $query->execute([$code]);
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $products;

    }
    function getSpecificProduct($id){
        $query = $this->db->prepare( "SELECT *
                                          FROM componentes
                                          INNER JOIN tipo_componente ON componentes.id_tipo = tipo_componente.id_tipo AND componentes.id = ?");
        $query->execute(array($id));
        $product = $query->fetch(PDO::FETCH_OBJ);
        
        return $product;
    }

    function setProducto($name,$mark,$price,$description,$code,$img = null){
        $pathImg = null;
        if ($img){
            $pathImg = $this->uploadImage($img);
        }
        $query = $this->db->prepare("INSERT INTO componentes(nombre_prod, marca,precio,descripcion,id_tipo,imagen) VALUES(?,?,?,?,?,?)");
        $query->execute(array($name,$mark,$price,$description,$code,$pathImg));
    }

    private function uploadImage($img){
        $target = 'img/' . uniqid() . '.jpg';
        move_uploaded_file($img, $target);
        return $target;
    }


    function deleteProduct($id){
        $query = $this->db->prepare("DELETE FROM componentes WHERE id=?");
        $query->execute(array($id));
    }

    function updateProduct($id, $price){
        $query = $this->db->prepare("UPDATE componentes SET precio=? WHERE id=?");
        $query->execute(array($price,$id));
    }

    function setImage($id,$img = null){
        $pathImg = null;
        if ($img){
            $pathImg = $this->uploadImage($img);
        }
        $query = $this->db->prepare("UPDATE componentes SET imagen=? WHERE id=?");
        $query->execute(array($pathImg,$id));
    }

    function necessaryPages(){
        $query = $this->db->prepare( "SELECT count(*) AS amount
                                          FROM tipo_componente
                                          INNER JOIN componentes ON tipo_componente.id_tipo = componentes.id_tipo");
        $query->execute();
        $product = $query->fetch(PDO::FETCH_OBJ);
        
        
        return ceil($product->amount/self::PRODUCTXPAGE);
    }

    function paginationProducts($page){
        $por_pag=self::PRODUCTXPAGE;
        $desde=($page-1)*$por_pag;

        $query = $this->db->prepare( "SELECT *
                                          FROM tipo_componente
                                          INNER JOIN componentes ON tipo_componente.id_tipo = componentes.id_tipo LIMIT $desde,$por_pag");
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ);

        return $products;
    }

    function searchByPrice($price){

        $query = $this->db->prepare( "SELECT *
                                          FROM tipo_componente
                                          INNER JOIN componentes ON tipo_componente.id_tipo = componentes.id_tipo AND componentes.precio < ? ");
        $query->execute([$price]);
        $productos = $query->fetchAll(PDO::FETCH_OBJ);

        return $productos;
    }

    function getMarks(){
        $query = $this->db->prepare( 'SELECT DISTINCT  marca FROM componentes');
        $query->execute();
        $marks = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $marks;
    }

    function searchByMark($mark){

        $query = $this->db->prepare( "SELECT *
                                          FROM tipo_componente
                                          INNER JOIN componentes ON tipo_componente.id_tipo = componentes.id_tipo AND componentes.marca = ? ");
        $query->execute([$mark]);
        $products = $query->fetchAll(PDO::FETCH_OBJ);

        return $products;
    }
}