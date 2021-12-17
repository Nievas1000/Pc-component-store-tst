<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';
class ViewUser{
    private $smarty;
    
    function __construct() {
        $this->smarty = new Smarty();
    }
    function loguearAdmin($error){
        $this->smarty->assign('titulo', 'Iniciar sesion:  ');
        $this->smarty->assign('error', $error);

        $this->smarty->display('templates/loginManage.tpl');
    }

    function viewEdition(){
        $this->smarty->assign('titulo', 'Seccion de administracion:  ');

        $this->smarty->display('templates/sectionEdit.tpl');
    }
    function viewEditCategory($categories,$error){
        $this->smarty->assign('titulo', 'Administracion de categorias:  ');
        $this->smarty->assign('categories', $categories);
        $this->smarty->assign('error', $error);


        $this->smarty->display('templates/editCategories.tpl');
    }

    function viewEditProducts($products,$categories){
        $this->smarty->assign('titulo', 'Administracion de productos:  ');
        $this->smarty->assign('products', $products);
        $this->smarty->assign('categories', $categories);

        $this->smarty->display('templates/editProducts.tpl');
    }

    function viewEditUsers($users){
        $this->smarty->assign('users', $users);

        $this->smarty->display('templates/editUsers.tpl');
    }
}