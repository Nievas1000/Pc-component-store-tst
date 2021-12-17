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
<h3>Da permiso o borra algun usuario</h3>
    <ul class="allCat list-group">
        {foreach from=$users item=$user}
            <li class="list-group-item">ID: {$user->id_usuario},  User: {$user->email}
             {if $user->admin eq 0}
             <a href="modificarRol/{$user->email}"><button type="button" class="btn btn-outline-primary">Hacer Admin</button></a>
             {else}
                 <a href="modificarRol/{$user->email}"><button type="button" class="btn btn-outline-primary">Quitar Admin</button></a>
             {/if}
             <a href="borrarUser/{$user->id_usuario}"><button class="btn btn-dark">Borrar</button></a>
             </li>
        {/foreach}
    </ul>
    
{include file='templates/footer.tpl'}