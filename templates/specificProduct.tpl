{include file='templates/header.tpl'}
{include file='templates/nav.tpl'}
<h1>{$titulo|cat:{$product->nombre_prod}}</h1>
<div class="prod-detalle">
    <div class="descripcion-prod">
        <ul class="allProd_group list-group">
            <li class="list-group-item">Marca: {$product->marca}</li>
            <li class="list-group-item">Precio: {$product->precio} $</li>
            <li class="list-group-item">Descripcion: {$product->descripcion}</li>
            <li class="list-group-item">Categoria: {$product->nombre}</li>
        </ul>
    </div>
        {if isset($product->imagen)}
            <div class="img-prod">
                <img class="imagen" src="{$product->imagen}"/>
            </div>
        {/if}
</div>
{if $sesion eq 0 || $sesion eq 1}
<div class="form-floating">
    <div class="contenedor-coment">
        <h3>Deja una reseña sobre el producto:</h3>
        <form class="form-coment">
            <textarea class="text_coment form-control" placeholder="Deja un comentario aqui" id="floatingTextarea2" style="height: 100px" name="texto" required></textarea>
            <label>Deja un puntaje del producto</label><select class="puntaje">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <input type="submit" value="Comentar" class="btn-coment">
        </form>
    </div>
    <div class="contenedor-filtro">
    <h3>Filtra los comentarios por puntaje:</h3>
        <form class="form-filtro">
        <label><strong>Puntaje: </label></strong><select class="filtro_puntaje">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <input type="submit" value="Buscar" class="btn-filtro">
    </form>
    </div>
</div>
{else}
    <div class="card w-75">
      <div class="card-body">
        <h5 class="card-title">¿Quieres dejar una reseña? Inicia sesion o registrate si no lo estas.</h5>
        <a href="administrar" class="btn btn-primary">Iniciar sesion</a>
      </div>
    </div>
{/if}
<div class="id" data-id="{$product->id}" data-rol="{$sesion}" data-user="{$user}">
    {include file='templates/vue/comments.tpl'}
</div>

<script src="js/comentarios.js"></script>
{include file='templates/footer.tpl'}