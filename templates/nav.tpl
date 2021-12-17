<header class="header">
        <div class="logo">
            <h1 class="king"><a href="">KingComponents</a></h1>
        </div>
        <nav>
          <ul class="navigation">
                <li><a href="categorias">Categorias de productos</a></li>
                <li><a href="productos/1">Todos los productos de la pagina</a></li>
                {if $sesion eq 1}
                    <li><a href="administrar">Administrar</a></li>
                {elseif $sesion eq 0}
                    <li><a href="cerrar">Cerrar sesion</a></li>
                {else}
                    <li><a href="administrar">Iniciar sesion</a></li>       
                {/if}
          </ul>
        </nav>  
</header>
<div class="container-fluid">