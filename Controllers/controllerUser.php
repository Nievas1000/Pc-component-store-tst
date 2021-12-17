<?php
require_once "Models/modelUser.php";
require_once "Views/viewUser.php";
require_once "Controllers/controllerProducts.php";
require_once "Models/modelProducts.php";
require_once "Models/modelCategory.php";
class ControllerUser{

    private $view;
    private $modelUser;
    private $modelProd;
    private $modelCat;

    function __construct(){
        $this->modelUser = new ModelUser();
        $this->modelProd = new ModelProducts();
        $this->modelCat = new ModelCategory();
        $this->view = new ViewUser();
    }

    public function registerUser(){
        if(!empty($_POST['email'])&& !empty($_POST['nombre'])&& !empty($_POST['password'])){
            $user = $this->modelUser->getUser($_POST['email']);
            if($user){
                $this->view->loguearAdmin(true);
            }else{
                $email=$_POST['email'];
                $name=$_POST['nombre'];
                $password=password_hash($_POST['password'], PASSWORD_DEFAULT);
                $this->modelUser->registerUser($email,$name,$password);
                $this->manageUsers();
                header("Location: " . BASE_URL);
            }
        }
    }

    public function manageUsers(){
        $password = $_POST['password'];
        $user = $this->modelUser->getUser($_POST['email']);
        
        if ($user && password_verify($password, $user->password)){
            session_start();
            $_SESSION['user'] = $user->nombre;
            $_SESSION['userId'] = $user->id_usuario;
            $_SESSION['admin'] = $user->admin;
            header("Location: " . BASE_URL."login");
        }else{
            header("Location: " . BASE_URL."administrar");
        }
    }

    public function closeSession(){
        session_start();
        session_destroy();
        header("Location: " . BASE_URL."administrar");
    }
    public function loguearAdmin(){
        session_start();
        if(isset($_SESSION['userId']) && $_SESSION['admin']==1){
            $this->view->viewEdition();
        }elseif(isset($_SESSION['userId']) && $_SESSION['admin']==0){
            header("Location: " . BASE_URL);
        }else{
            $this->view->loguearAdmin(false);
        }
    }

    public function checkLogInAdmin(){
        session_start();
        
        if(!isset($_SESSION['userId']) || $_SESSION['admin']!=1){
            header("Location: " . BASE_URL."administrar");
            die();
        }
    }

    public function adminOrUser(){
        session_start();
        if(isset($_SESSION['userId']) && $_SESSION['admin']==1){
            return $_SESSION['admin'];
        }elseif(isset($_SESSION['userId']) && $_SESSION['admin']==0){
            return $_SESSION['admin'];
        }else{
            return -1;
        }
    }

    protected function userConnected(){
        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        }
        return null;
    }

    public function sectionEditCategory($error){
        session_start();
        if(isset($_SESSION['userId']) && $_SESSION['admin']==1){
            $categories=$this->modelCat->getCategories();
            $this->view->viewEditCategory($categories,$error);
        }else{
            header("Location: " . BASE_URL."administrar");
        }
    }

    public function sectionEditProduct(){
        session_start();
        if(isset($_SESSION['userId']) && $_SESSION['admin']==1){
            $categories=$this->modelCat->getCategories();
            $products=$this->modelProd->getAllProducts();
            $this->view->viewEditProducts($products,$categories);
        }else{
            header("Location: " . BASE_URL."administrar");
        }
    }

    public function sectionEditUsers(){
        session_start();
        if(isset($_SESSION['userId']) && $_SESSION['admin']==1){
            $users=$this->modelUser->getUsers();
            $this->view->viewEditUsers($users);
        }else{
            header("Location: " . BASE_URL."administrar");
        }
    }

    public function deleteUser($id){
        $this->checkLogInAdmin();
        $this->modelUser->deleteUser($id);
        header("Location: " . BASE_URL."seccionUser");
    }

    public function updateRol($email){
        $this->checkLogInAdmin();
        $user = $this->modelUser->getUser($email);
        if($user->admin == 1){
            $this->modelUser->updateRol($email,0);
        }else{
            $this->modelUser->updateRol($email,1);
        }
        header("Location: " . BASE_URL."seccionUser");
    }
}
