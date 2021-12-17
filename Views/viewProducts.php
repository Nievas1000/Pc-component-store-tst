<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';
class ViewProducts{
    private $smarty;
    
    function __construct() {
        $this->smarty = new Smarty();
    }

    function showCategories($categories,$sesion){
        $this->smarty->assign('titulo', 'Todas las categorias actuales');
        $this->smarty->assign('titulo2', 'Mira los productos por categorias que te interesen');
        $this->smarty->assign('categories', $categories);
        $this->smarty->assign('sesion', $sesion);

        $this->smarty->display('templates/categories.tpl');
    }

    function showProducts($products,$sesion,$amount,$page,$marks){
        $this->smarty->assign('titulo', 'Lista de todos los productos disponibles: ');
        $this->smarty->assign('products', $products);
        $this->smarty->assign('sesion', $sesion);
        $this->smarty->assign('amount', $amount);
        $this->smarty->assign('page', $page);
        $this->smarty->assign('marks', $marks);

        $this->smarty->display('templates/products.tpl');
    }

    function getProductByCat($products,$categoryProd,$categories,$sesion){
        $this->smarty->assign('titulo1', 'Todas las categorias actuales');
        $this->smarty->assign('titulo2', 'Mira los productos por categorias que te interesen');
        $this->smarty->assign('titulo3', 'Productos de la categoria: ');
        $this->smarty->assign('products', $products);
        $this->smarty->assign('categoryProd', $categoryProd);
        $this->smarty->assign('categories', $categories);
        $this->smarty->assign('sesion', $sesion);

        $this->smarty->display('templates/productByCat.tpl');
    }

    function specificProduct($product,$sesion,$user = null){
        $this->smarty->assign('titulo', 'Detalle del producto: ');
        $this->smarty->assign('product', $product);
        $this->smarty->assign('sesion', $sesion);
        $this->smarty->assign('user', $user);

        $this->smarty->display('templates/specificProduct.tpl');
    }

    function advancedSearch($products,$sesion,$marks){
        $this->smarty->assign('titulo', 'Lista de todos los productos disponibles: ');
        $this->smarty->assign('products', $products);
        $this->smarty->assign('sesion', $sesion);
        $this->smarty->assign('marks', $marks);

        $this->smarty->display('templates/advancedSearch.tpl');
    }
}
