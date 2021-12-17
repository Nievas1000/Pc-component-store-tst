{literal}

    <div id="appComent">
    <h1>{{titulo}}</h1>
        <div class="lista_comentarios" v-for="comment in comments">
            <div class="caja_img">
                <h6><img src="img/usuario.png" class="img_user"></h6>
            </div>
            <div class="caja_coment">
                <div class="datos_coment"> 
                    <h5 class="user_coment">{{comment.user_coment}}</h5>
                    <p class="fecha_coment">{{comment.fecha}}</p>
                </div>
                <p class="comentario" v-if="rol" >{{comment.texto}} - Puntaje: {{comment.puntaje}}<button v-on:click="deleteComment(comment.id)" :borrar="comment.id" id="borrar" class="btn-borrar">Borrar</button></p>
                <p class="comentario" v-else>{{comment.texto}} - Puntaje: {{comment.puntaje}}</p>
            </div>
        </div>
    </div>
    
{/literal}