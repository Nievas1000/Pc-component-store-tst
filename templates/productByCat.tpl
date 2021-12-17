{include file='templates/header.tpl'}
{include file='templates/nav.tpl'}

<div class="catYprod">
<div class="categorias">
<h1>{$titulo1}</h1>
    <ul class="allCat list-group">
        {foreach from=$categories item=$cate}
            <li class="list-group-item">Nombre: {$cate->nombre}</li>
        {/foreach}
    </ul>
</div>    

<div class="prodXcat">
<h3 class="display-5">{$titulo2}</h3>
    <form action="buscar" method="post">
        <select name="categoria">
        {foreach from=$categories item=$cate}
            <option value="{$cate->id_tipo}">{$cate->nombre}</option>
        {/foreach}
        </select>
        <input type="submit" value="Buscar">
    </form> 
<h3>{$titulo3|cat:{$categoryProd->nombre}}</h3>

{foreach from=$products item=$prod}
    <ul class="allProd_group list-group">
        <li class="list-group-item">Nombre: {$prod->nombre_prod}</li>
        <li class="list-group-item">Marca: {$prod->marca}</li>
        <li class="list-group-item">Descripcion: {$prod->descripcion}</li>
        <li class="list-group-item">Precio: {$prod->precio}$</li>
    </ul>  
{/foreach}
</div>

</div>
{include file='templates/footer.tpl'}