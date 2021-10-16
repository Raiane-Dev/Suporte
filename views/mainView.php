<?php
    namespace views;

    class mainView{
        public static function render($file,$par = null){
            include('pages/'.$file.'.php');
        }
    }
?>