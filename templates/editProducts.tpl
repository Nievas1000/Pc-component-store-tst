{include file='templates/header.tpl'}
<header class="header">
        <div class="logo">
            <h1 class="king"><a href="">KingComponents</a></h1>
        </div>
        <nav>
          <ul class="navigation">
                <li><a href="categorias">Categorias de productos</a></li>
                <li><a href="productos/1">Todos los productos de la pagina</a></li>
                <li><a href="administrar">Administrar</a></li>
          </ul>
        </nav>  
</header>
<div class="container-fluid">

<div class="productos">
<div class="exp_prod">
    <h1 class="title_prod">{$titulo}</h1>
    {foreach from=$products item=$prod}
        <ul class="allProd_group list-group">
            <li class="list-group-item">Nombre: {$prod->nombre_prod}</li>
            <li class="list-group-item">Marca: {$prod->marca}</li>
            <li class="list-group-item">Precio: {$prod->precio} $</li>
            <li class="list-group-item">Descripcion: {$prod->descripcion}</li>
            <li class="list-group-item">Categoria: {$prod->nombre}</li>
            <li class="list-group-item"><a href="borrarProd/{$prod->id}"><button class="btn btn-dark">Borrar</button></a></li>
        </ul>
        <form class="allProd_item form-alta" action="editarProd/{$prod->id}" method="post">
            <input class="input_precio form-control" type=number name=precio placeholder="Cambia el precio del producto.">
            <input type=submit value=Cambiar>
        </form>
        {if !isset($prod->imagen)}
            <form class="allProd_item form-alta" action="insertImg/{$prod->id}" method="post" enctype="multipart/form-data">
                <label>Sube una imagen asociada al producto.</label><br>
                <input type="file" name="input_name" id="imageToUpload"><br>
                <input type="submit" value="Subir">
            </form>
        {else}
            <li class="list-group-item"><a href="insertImg/{$prod->id}"><button class="btn btn-dark">Borrar imagen asociada</button></a></li>
        {/if}
    {/foreach}
</div>    
<div class="agg_prod">
<h1 class="title_prod">Guarda un producto en la pagina</h1>
    <form class="form-alta" action="agregarProd" method="post" enctype="multipart/form-data">
        <input class=" form-control" type="text" name="nombre" placeholder="Nombre del producto" required><br>
        <input class=" form-control" type="text" name="marca" placeholder="Marca del producto" required><br>
        <input class=" form-control" type="number" name="precio" placeholder="Precio del producto" required><br>
        <input type="file" name="input_name" id="imageToUpload"><br>
        <label>Detalles del producto:</label><br>
        <textarea class="textarea" name="descripcion"></textarea><br>
        <label>Categoria:</label>
        <select name="categoria">
        {foreach from=$categories item=$cate}
            <option value="{$cate->id_tipo}">{$cate->nombre}</option>
        {/foreach}
        </select>
        <input type="submit" value="Insertar">
    </form>

</div>
</div>
    
{include file='templates/footer.tpl'}