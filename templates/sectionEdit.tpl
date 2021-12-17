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

<a href="cerrar" class="btnCerrar btn-primary btn-lg">Cerrar sesion</a>
<h1>{$titulo}</h1>

<div class="cards">
<div class="row">
  <div class="col-sm-6" id="card-cat">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Haz modificaciones en las categorias</h5>
        <p class="card-text">En esta seccion podras cambiar el nombre de una categoria, borrarla o agregar una nueva.</p>
        <a href="seccionCat" class="btn btn-primary">Modificar Categorias</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6" id="card-prod">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Haz modificaciones en los productos</h5>
        <p class="card-text">En esta seccion podras cambiar el nombre de una ctegoria, borrarla o agregar una nueva.</p>
        <a href="seccionProd" class="btn btn-primary">Modificar Productos</a>
      </div>
    </div>
  </div>
</div>
  <div class="col-sm-6" id="card-user">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Haz modificaciones en los usuarios</h5>
        <p class="card-text">En esta seccion podras asignar un rol a un usuario o eliminarlo.</p>
        <a href="seccionUser" class="btn btn-primary">Modificar Usuarios</a>
      </div>
    </div>
  </div>
</div>
</div>
{include file='templates/footer.tpl'}