<?php
    namespace controladores;

    class adminController{
        public function index(){
            \views\mainView::render('admin');
        }
    }
?>