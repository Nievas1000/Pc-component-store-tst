"use strict";

const API_URL = 'api/comments';

let appComment = new Vue({
    el: "#appComent",
    data: {
        titulo: "Comentarios del producto:",
        comments: [],
        rol: false,
    },
    methods: {
        deleteComment: function(itemId){
            deleteComment(itemId);
        }
    }
});
getComments();

async function getComments(){
    
    try {
        let id = document.querySelector(".id").dataset.id;
        let response = await fetch(API_URL+`/${id}`);
        let comments = await response.json();
        appComment.comments = comments;
        if(document.querySelector(".id").dataset.rol == 1){
            appComment.rol = true;
        }
    } catch (error) {
        console.log(error);
    }
}

if(document.querySelector(".form-coment")){
    document.querySelector(".form-coment").addEventListener("submit", addComment);
}

async function addComment(e){
    e.preventDefault();
    let data = {
        id_componente: document.querySelector(".id").dataset.id,
        texto: document.querySelector("#floatingTextarea2").value,
        user_coment: document.querySelector(".id").dataset.user,
        puntaje: document.querySelector(".puntaje").value,
    }
    try {
        let result = await fetch(API_URL,{
            "method": "POST",
            "headers": { "Content-type": "application/json" },
            "body": JSON.stringify(data)
        });
        if(result.status==200){
            document.querySelector(".form-coment").reset();
            getComments();
        }
    } catch (error) {
        console.log(error);
    }
}

async function deleteComment(id){
    try{
        let resultado = await fetch(API_URL+`/${id}`,{
            "method": "DELETE"
        });
        if(resultado.status == 200){
            getComments();
        }
    }catch(error){
        console.log(error);
    }
    getComments();
}

if(document.querySelector(".form-filtro")){
    document.querySelector(".form-filtro").addEventListener("submit", filterByRate);
}

async function filterByRate(e){
    e.preventDefault();
    try {
        let rate = document.querySelector(".filtro_puntaje").value;
        let id = document.querySelector(".id").dataset.id;
        let response = await fetch(API_URL+`/${id}/${rate}`);
        let comments = await response.json();
        appComment.comments = comments;
        if(document.querySelector(".id").dataset.rol == 1){
            appComment.rol = true;
        }
    } catch (error) {
        console.log(error);
    }
}