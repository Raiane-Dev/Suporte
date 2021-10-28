<section class="admin">
<?php
    if(isset($_POST['responder_novo_chamado'])){
        $token = $_POST['token'];
        $email = $_POST['email'];
        $mensagem = $_POST['mensagem'];

        $sql = \MySql::conectar()->prepare("INSERT INTO `interacao_chamado` VALUES (null, ?, ?, ?, 1)");
        $sql->execute(array($token,$mensagem,1));

        //Vamos enviar um email para aviso de interação no chamado
        if(isset($_POST['responder_nova_interacao'])){
            $mensagem = $_POST['mensagem'];
            $token = $_POST['token'];

            $email = \MySql::conectar()->prepare("SELECT * FROM chamados WHERE token = ?");
            $email->execute(array($token));
            $email = $email->fetch()['email'];

            \MySql::conectar()->exec("UPDATE `interacao_chamado` SET status = 1 WHERE id = $_POST[id]");

            $sql = \MySql::conectar()->prepare("INSERT INTO `interacao_chamado` VALUES (null, ?, ?, 1, 1)");
            $sql->execute(array($token,$mensagem));

        //Vamos enviar um email para aviso de interação no chamado
        $mail = new PHPMailer(true);
        try{
            $mail->SMTPDebug = 0;
            $mail->CharSet = "UTF-8";
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'MEU EMAIL';
            $mail->Password = 'MINHA SENHA';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom('raiane.dev@gmail.com','Raiane Dev');
            $mail->addAddress($email,'');

            $mail->isHTML(true);
            $url = BASE.'chamado?token='.$token;
            $informacoes = 'Uma nova interação foi feita no seu chamado! <br /> Utilize o link abaixo para interagir: <br />
            <a href="'.$url.'"> Acessar Chamado! </a>';
            $mail->Subject = 'Nova interação no chamado: '.$token;
            $mail->Body = $informacoes;

            $mail->Send();
            echo 'Mensagem enviada com sucesso';
        }catch(Exception $e){
            echo 'Erro ao enviar, tente novamente mais tarde';
        }
    }
}
?>
<div class="novos-chamado">
    <?php
        $pegarChamados = \MySql::conectar()->prepare("SELECT * FROM `chamados` ORDER BY id DESC");
        $pegarChamados->execute();
        $pegarChamados = $pegarChamados->fetchAll();
        foreach($pegarChamados as $key => $value){
            $verificaInteracao = \MySql::conectar()->prepare("SELECT * FROM `interacao_chamado` WHERE id_chamado = '$value[token]'");
            $verificaInteracao->execute();
            if($verificaInteracao->rowCount() >= 1){
                continue;
            }
    ?>
    <div class="chamado-single"><a href="<?php echo BASE ?>chamado?token=<?php echo $value['token']?>">
        <span><i data-feather="bookmark"></i> Ticket</span>
        <p><?php echo $value['pergunta']; ?></p>
        <span class="info"><?php echo $value['email']; ?> <span>
        <span class="info"><?php echo $value['criado']; ?> <span></a>
        <form method="post">
                <textarea name="mensagem" placeholder="Escreva..."></textarea>
                <input type="hidden" name="token" value="<?php echo $value['token']; ?>" />
                <input type="hidden" name="email" value="<?php echo $value['email']; ?>" />
                <input type="submit" name="responder_novo_chamado" value="Enviar" />
            </form>
    </div>
    <?php } ?>
</div>
