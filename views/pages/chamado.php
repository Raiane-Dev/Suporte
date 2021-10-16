<section class="chamado">
<?php
    $token = $_GET['token'];
?>
    <h2>Visualizando chamado: <?php echo $token; ?></h2>

<div class="mensagens">
<?php
    if(isset($_POST['responder_chamado'])){
        $mensagem = $_POST['mensagem'];
        $sql = \MySql::conectar()->prepare("INSERT INTO `interacao_chamado` VALUES (null, ?, ?, ?, 0)");
        $sql->execute(array($token,$mensagem,-1));

        echo '<script>location.href="'.BASE.'chamado?token='.$token.'";</script>';
        die();
    }
?>
<?php
    $puxarInteracoes = \MySql::conectar()->prepare("SELECT * FROM `interacao_chamado` WHERE id_chamado = ?");
    $puxarInteracoes->execute(array($token));
    $puxarInteracoes = $puxarInteracoes->fetchAll();
    foreach($puxarInteracoes as $key => $value){
        if($value['admin'] == 1){ ?>
            <div class="mensagem-admin">
                <p><?php echo $value['mensagem']; ?></p>
            </div>
        <?php }else{ ?>
            <div class="mensagem-usuario">
                <p><?php echo $value['mensagem']; ?></p>
            </div>
        <?php }} ?>
</div>


<?php
    $sql = \MySql::conectar()->prepare("SELECT * FROM interacao_chamado WHERE id_chamado = ? ORDER BY id DESC");
    $sql->execute(array($token)); ?>
        <div class="escrever">
            <form method="post">
                <textarea name="mensagem" placeholder="Escreva..."></textarea>
                <input type="submit" name="responder_chamado" value="Enviar" />
            </form>
        </div>
</section>