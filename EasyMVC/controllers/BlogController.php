<?php
class BlogController extends Controller{

    function index(){
        echo "home page of BlogController";
    }

    function list($name){
        $user = $this->model("User");
        $user->name = $name;
        $this->view("Blog/list", $user);
    }
}
?>