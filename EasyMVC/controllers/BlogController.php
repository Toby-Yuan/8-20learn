<?php
class BlogController extends Controller{

    function index(){
        echo "home page of BlogController";
    }

    function list($name){
        echo "List : $name";
    }
}
?>