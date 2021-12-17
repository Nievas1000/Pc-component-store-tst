<?php
require_once "Models/modelComents.php";
require_once "Views/viewApi.php";
require_once "Controllers/controllerUser.php";
class ControllerApi extends ControllerUser{

    private $model;
    private $view;

    function __construct(){
        $this->model = new ModelComents();
        $this->view = new ViewApi();
    }

    private function getBody() {
        $bodyString = file_get_contents("php://input");
        return json_decode($bodyString);
    }

    public function getComments($params = null){
        $id = $params[":ID"];
        $comments = $this->model->getComments($id);
        $this->view->response($comments,200);
    }

    public function addComment($params = null){
        $body = $this->getBody();

        if(!empty($body->texto) && !empty($body->id_componente) && !empty($body->puntaje) && !empty($body->user_coment)){
            $comment=$this->model->addComment($body->id_componente, $body->texto, $body->puntaje, $body->user_coment);
            if($comment){
                $this->view->response("The comment was inserted with the id=$comment", 200);
            }else{
                $this->view->response("The comment could not be sent", 500);
            }
        }else{
            $this->view->response("Unable shipping", 400);
        }
    }

    public function deleteComment($params = null){
        $this->checkLogInAdmin();
        $id = $params[":ID"];
        $this->model->deleteComment($id);
    }

    public function getCommentsByRate($params = null){
        $id = $params[":ID"];
        $rate = $params[":PUNTAJE"];
        $comments = $this->model->getCommentsByRate($rate,$id);
        $this->view->response($comments,200);
    }
}