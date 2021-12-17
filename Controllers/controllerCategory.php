<?php
require_once "Models/modelProducts.php";
require_once "Models/modelCategory.php";
require_once "Views/viewProducts.php";
require_once "Controllers/controllerUser.php";
require_once "Controllers/controllerProducts.php";
class ControllerCategory extends ControllerUser{

    private $view;
    private $model;
    private $modelProd;
    private $viewUser;

    function __construct(){
        $this->model = new ModelCategory();
        $this->modelProd = new ModelProducts();
        $this->view = new ViewProducts();
        $this->viewUser = new ViewUser();
    }

    public function getCategories(){
        $categories=$this->model->getCategories();
        $this->view->showCategories($categories,$this->adminOrUser());
    }

    public function setCategory(){
        $this->checkLogInAdmin();
        if(isset($_POST['nombre'])){
            $this->model->setCategory($_POST['nombre']);
            header("Location: " . BASE_URL."seccionCat");
        }
    }

    public function deleteCategory($id){
        $this->checkLogInAdmin();
        $categories=$this->model->getCategories();
        $products = $this->modelProd->getProductByCat($id);
        if($products){
            $this->viewUser->viewEditCategory($categories,true);
        }else{
            $this->model->deleteCategory($id);
            header("Location: " . BASE_URL."seccionCat");
        }
        
    }

    public function updateCategory(){
        $this->checkLogInAdmin();
        if(isset($_POST['nombreAnt'])&&isset($_POST['nombreNew'])){
        $this->model->updateCategory($_POST['nombreAnt'],$_POST['nombreNew']);
        header("Location: " . BASE_URL."seccionCat");
        }
    }
}
