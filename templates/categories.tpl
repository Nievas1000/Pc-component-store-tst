{include file='templates/header.tpl'}
{include file='templates/nav.tpl'}

<div class="catYprod">
<div class="categorias">
    <h1>{$titulo}</h1>
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
        <input class="btn btn-primary btn-sm" type="submit" value="Buscar">
    </form>
</div>

</div>
{include file='templates/footer.tpl'}