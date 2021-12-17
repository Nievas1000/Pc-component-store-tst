<?php
require_once "Controllers/controllerCategory.php";
require_once "Controllers/controllerProducts.php";
require_once "Controllers/controllerUser.php";
require_once "Controllers/ControllerApi.php";

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');


$action = $_GET['action'];
$partesURL = explode("/", $action);

$controllerCat = new ControllerCategory();
$controllerProd = new ControllerProducts();
$controllerUser = new ControllerUser();
if($action == ""){
    $controllerProd->getProducts(1);
}else{
    if(isset($action)){
        $partesURL = explode("/", $action);
    
        switch($partesURL[0]){
        case 'categorias':
            $controllerCat->getCategories();
            break;
        case 'productos':
            $controllerProd->getProducts($partesURL[1]);
            break;
        case 'buscar':
            $controllerProd->getProductsByCat();
            break;
        case is_numeric($partesURL[0]):
            $controllerProd->descriptionItem($partesURL[0]);
            break;
        case 'agregarProd':
            $controllerProd->setProduct();
            break;
        case 'agregarCat':
            $controllerCat->setCategory();
            break;
        case 'borrarProd':
            $controllerProd->deleteProduct($partesURL[1]);
            break;
        case 'borrarCat':
            $controllerCat->deleteCategory($partesURL[1]);
            break;
        case 'editarProd':
            $controllerProd->updateProduct($partesURL[1]);
            break;
        case 'insertImg':
            $controllerProd->setImage($partesURL[1]);
        break;    
        case 'editarCat':
            $controllerCat->updateCategory();
            break;
        case 'registro':
            $controllerUser->registerUser();
            break;
        case 'administrar':
            $controllerUser->loguearAdmin();
            break;
        case 'login':
            $controllerUser->manageUsers();
            break;
        case 'cerrar':
            $controllerUser->closeSession();
            break;
        case 'seccionCat':
            $controllerUser->sectionEditCategory(false);
            break;
        case 'seccionProd':
            $controllerUser->sectionEditProduct();
            break;
        case 'seccionUser':
            $controllerUser->sectionEditUsers();
            break;
        case 'borrarUser':
            $controllerUser->deleteUser($partesURL[1]);
            break; 
        case 'modificarRol':
            $controllerUser->updateRol($partesURL[1]);
            break;
        case 'avanzada':
            if(isset($partesURL[1]) && $partesURL[1] == 'precio'){
                $controllerProd->searchByPrice();
            }elseif($partesURL[1] == 'marca'){
                $controllerProd->searchByMark();
            }
            break;
        default:
            echo('404 Page not found'); 
            break;
      }
    }
}