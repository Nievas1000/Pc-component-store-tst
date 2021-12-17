{include file='templates/header.tpl'}
{include file='templates/nav.tpl'}  

<div class="productos">

<div class="exp_prod">
    <h1 class="title_prod">{$titulo}</h1>
    {foreach from=$products item=$prod}
        <ul class="allProd_group list-group">
            <li class="list-group-item">Nombre: {$prod->nombre_prod}</li>
            <li class="list-group-item">Marca: {$prod->marca}</li>
            <li class="list-group-item">Categoria: {$prod->nombre}</li>
            <li class="allProd_item list-group-item"><a href="{$prod->id}">Mas informacion</a></li>
        </ul>
    {/foreach}
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            {if $page eq 1}
                <li class="page-item"><a class="page-link" href="productos/1">Anterior</a></li>
            {else}
                <li class="page-item"><a class="page-link" href="productos/{$page-1}">Anterior</a></li> 
            {/if}
            {foreach item=i from=1|@range:$amount}
                 <li class="page-item"><a class="page-link" href="productos/{$i}">{$i}</a></li>
            {/foreach}
            {if $page eq $amount}
                <li class="page-item"><a class="page-link" href="productos/{$amount}">Siguiente</a></li>
            {else}
                <li class="page-item"><a class="page-link" href="productos/{$page+1}">Siguiente</a></li>
            {/if}
        </ul>
    </nav>
</div>
<div class="form_busq">
    <form action="avanzada/precio" method="post" class="form_precio">
        <h4>Productos con un precio menor a: </h4>
        <input class="input_precio form-control" type=number name=precio placeholder="Precio...">
        <input class="btn btn-primary btn-sm" type=submit value=Aplicar>
    </form>

    <form action="avanzada/marca" method="post" class="form_marca">
        <h4>Productos de la marca:  </h4>
        {foreach from=$marks item=$marca}
            <label><input type="checkbox" name="marca" value="{$marca->marca}"> {$marca->marca}</label><br>
        {/foreach}
        <input class="btn btn-primary btn-sm" type=submit value=Aplicar>
    </form>
</div>       
</div>
{include file='templates/footer.tpl'}