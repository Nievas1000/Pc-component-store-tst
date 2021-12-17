{include file='templates/header.tpl'}
<header class="header">
        <div class="logo">
            <h1 class="king"><a href="">KingComponents</a></h1>
        </div>
        <nav>
          <ul class="navigation">
                <li><a href="categorias">Categorias de productos</a></li>
                <li><a href="productos/1">Todos los productos de la pagina</a></li>
                <li><a href="administrar">Iniciar sesion</a></li>
          </ul>
        </nav>  
</header>
<div class="container-fluid">
<h3 class="display-5">{$titulo}</h3>
    <form class="form-alta" action="login" method="post">
        <input class=" form-control" type="text" name="email" placeholder="Email" required><br>
        <input class=" form-control" type="password" name="password" placeholder="Contraseña" required><br>
        <input type="submit" value="Ingresar">
    </form>

<h3>¿No tines cuenta?</h3>
<h4>Registrate:</h4>
<h3 class="alert-danger">{if $error}El email ingresado ya esta registrado{/if}</h3>
    <form class="form-alta" action="registro" method="post">
        <input class=" form-control" type="text" name="nombre" placeholder="Nombre de usuario" required><br>
        <input class=" form-control" type="text" name="email" placeholder="Email" required><br>
        <input class=" form-control" type="password" name="password" placeholder="Contraseña" required><br>
        <input type="submit" value="Ingresar">
    </form>

{include file='templates/footer.tpl'}