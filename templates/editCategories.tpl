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

<h1>{$titulo}<h1>
<div class="categoriasEdit">
<div class="add_categoria">
<h2>Agrega una nueva categoria: </h2>
    
<form class="form-alta" action=agregarCat method=post>
        <input class=" form-control" type=text name=nombre placeholder="Nombre de la categoria" required>
        <button type="submit" class="btn btn-secondary">Enviar</button>
</form>
</div>

<div class="edit_categoria">
<h2>Cambia el nombre de la categoria: </h2>

    <form class="form-alta" action=editarCat method=post>
        <input class=" form-control" type=text name=nombreAnt placeholder="Nombre de la categoria que le quieras cambiar el nombre" required>
        <input class=" form-control" type=text name=nombreNew placeholder="Nuevo nombre de la categoria" required>
        <button type="submit" class="btn btn-secondary">Enviar</button>
    </form>
</div>
</div>

<h3>Borra alguna categoria</h3>
<h3 class="alert-danger">{if $error}No se puede borrar la categoria porque tiene productos asignados.{/if}</h3>
    <ul class="allCat list-group">
        {foreach from=$categories item=$cate}
            <li class="list-group-item">ID: {$cate->id_tipo},  Nombre: {$cate->nombre}      <a href="borrarCat/{$cate->id_tipo}"><button class="btn btn-dark">Borrar</button></a></li>
        {/foreach}
    </ul>
    
{include file='templates/footer.tpl'}