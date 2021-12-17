<?php
require_once "Models/modelProducts.php";
require_once "Models/modelCategory.php";
require_once "Views/viewProducts.php";
require_once "Controllers/controllerUser.php";
require_once "Controllers/controllerCategory.php";
class ControllerProducts extends ControllerUser{

    private $view;
    private $modelProd;
    private $modelCat;

    function __construct(){
        $this->modelProd = new ModelProducts();
        $this->modelCat = new ModelCategory();
        $this->view = new ViewProducts();
    }

    public function getProducts($page){
        $products=$this->modelProd->paginationProducts($page);
        $marks = $this->modelProd->getMarks();
        $this->view->showProducts($products,$this->adminOrUser(),$this->modelProd->necessaryPages(),$page,$marks);
        
    }

    public function getProductsByCat(){
        if(isset($_POST['categoria'])){
            $products=$this->modelProd->getProductByCat($_POST['categoria']);
            $category=$this->modelCat->getSpecificCategory($_POST['categoria']);
            $categories=$this->modelCat->getCategories();
            $this->view->getProductByCat($products,$category,$categories,$this->adminOrUser());
        }
    }

    public function descriptionItem($id){
        $product=$this->modelProd->getSpecificProduct($id);
        $this->view->specificProduct($product,$this->adminOrUser(),$this->userConnected());
    }

    public function setProduct(){
        $this->checkLogInAdmin();
        if(isset($_POST['nombre']) && isset($_POST['marca']) && isset($_POST['precio']) && isset($_POST['descripcion']) && isset($_POST['categoria'])){
            if($_FILES['input_name']['type'] == "image/jpg" || $_FILES['input_name']['type'] == "image/jpeg" || $_FILES['input_name']['type'] == "image/png"){
                $this->modelProd->setProducto($_POST['nombre'],$_POST['marca'],$_POST['precio'],$_POST['descripcion'],$_POST['categoria'],$_FILES['input_name']['tmp_name']);
                header("Location: " . BASE_URL."seccionProd");
            }else{
                $this->modelProd->setProducto($_POST['nombre'],$_POST['marca'],$_POST['precio'],$_POST['descripcion'],$_POST['categoria']);
                header("Location: " . BASE_URL."seccionProd");
            }
        }
    }

    public function deleteProduct($id){
        $this->checkLogInAdmin();
        $this->modelProd->deleteProduct($id);
        header("Location: " . BASE_URL."seccionProd");
    }

    public function updateProduct($id){
        $this->checkLogInAdmin();
        if(isset($_POST['precio'])){
            $this->modelProd->updateProduct($id,$_POST['precio']);
            header("Location: " . BASE_URL."seccionProd");
        }
    }

    public function setImage($id){
        $this->checkLogInAdmin();
        if($_FILES['input_name']['type'] == "image/jpg" || $_FILES['input_name']['type'] == "image/jpeg" || $_FILES['input_name']['type'] == "image/png"){
            $this->modelProd->setImage($id,$_FILES['input_name']['tmp_name']);
            header("Location: " . BASE_URL."$id");
        }else{
            $this->modelProd->setImage($id);
            header("Location: " . BASE_URL."seccionProd");
        }
    }

    public function searchByPrice(){
        $marks = $this->modelProd->getMarks();
        $price = $_POST['precio'];
        $products = $this->modelProd->searchByPrice($price);
        if($products){
            $this->view->advancedSearch($products,$this->adminOrUser(),$marks);
        }else{
            header("Location: " . BASE_URL);
        }
    }

    public function searchByMark(){
        $marks = $this->modelProd->getMarks();
        $mark = $_POST['marca'];
        $products = $this->modelProd->searchByMark($mark);
        if($products){
            $this->view->advancedSearch($products,$this->adminOrUser(),$marks);
        }else{
            header("Location: " . BASE_URL);
        }
    }
}
