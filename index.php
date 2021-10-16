<?php
    define('HOST','localhost');
    define('DATABASE','suporte_personalizado');
    define('USER','root');
    define('PASSWORD','');

    define('BASE','http://localhost/Curso/Projeto/Suporte/');

    require 'vendor/autoload.php';

    $autoload = function ($class){
        include($class.'.php');
    };
    spl_autoload_register($autoload);

    $homeController = new \controladores\homeController();
    $chamadoController = new \controladores\chamadoController();
    $adminController = new \controladores\adminController();

    include('views/modelos/header.php');

    Router::get('/', function() use ($homeController){
        $homeController->index();
    });
    Router::get('/chamado', function() use($chamadoController){
        if(isset($_GET['token'])){
            if($chamadoController->existeToken()){
                //Verificar se o Token existe
                $info = $chamadoController->getPergunta($_GET['token']);
                $chamadoController->index($info);
            }else{
                die('O Token não existe.');
            }
        }else{
            die('Gere um token para interagir ao chamado.');
        }
    });

    Router::get('/admin', function() use ($adminController){
        $adminController->index();
    });


    include('views/modelos/footer.php');
?>