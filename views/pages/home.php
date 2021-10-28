<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
	date_default_timezone_set('America/Sao_Paulo');
?>
<?php
    if(isset($_POST['acao'])){
        $email = $_POST['email'];
        $pergunta = $_POST['pergunta'];
        $token = md5(uniqid());
        $criado = time();
        $sql = \MySql::conectar()->prepare("INSERT INTO chamados VALUES (null, ?, ?, ?, ?)");
        $sql->execute(array($pergunta,$email,$token,$criado));

        //Vamos enviar um email para abrir o chamado
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
            $informacoes = 'Olá, seu chamado foi criado com sucesso! <br /> Utilize o link abaixo para interagir: <br />
            <a href="'.$url.'"> Acessar Chamado! </a>';
            $mail->Subject = 'Seu Chamado foi Aberto';
            $mail->Body = $informacoes;

            $mail->Send();
            echo 'Mensagem enviada com sucesso';
        }catch(Exception $e){
            echo 'Erro ao enviar, tente novamente mais tarde';
        }
        echo '<script>location.href="http://localhost/Curso/Projeto/Suporte/chamado?token='.$token.'"</script>';
        die();
    }
?>
<section id="fechar" class="comeco">
    <div class="apresentacao">
        <h3>Seja bem Vindo</h3>
        <h2>Abrir Chamado</h2>
    </div>

    <div class="texto">
        <h6>Consectetur, adipisci velit...</h6>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
        <button id="continuar">Continuar</button>
    </div>
</section>

<section id="abrir" class="abrir-chamado">
    <div class="abrir-chamado">
        <form method="post">
            <h2>Crie o seu ticket</h2>
            <label>Seu email</label>
            <input type="email" name="email"  placeholder="example@gmail.com"/>
            <label>Qual sua pergunta?</label>
            <textarea name="pergunta" placeholder="..."></textarea>
            <input type="submit" name="acao" value="Enviar">
        <span>Enviaremos um email com as informações.</span>
        </form>
    </div>
    <div class="shape-1"></div>
</section>
