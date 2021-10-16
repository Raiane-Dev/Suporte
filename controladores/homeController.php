<?php
    namespace controladores;

    class homeController{
        public function index(){
            \views\mainView::render('home');
        }
    }

?>