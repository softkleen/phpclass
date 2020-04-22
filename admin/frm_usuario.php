<?php
require_once('conexao.php');
require_once('../config.php');
if(isset($_POST['cadastro_usuario'])){
    $nome=$_POST['nome'];
    $email=$_POST['email'];
    $foto=$_FILES['foto'];
    if(!empty($foto['name'])){
        $largura = LARGURA_IMG;
        $altura = 425;
        $tamanho = 300000;
        $error = array();
        if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/",$foto['type'])){
            $error[1] = "Este arquivo não é uma imagem";
        } 
        $dimensoes = getimagesize($foto['tmp_name']);
        if($dimensoes[0]>$largura){
            $error[2] = "A largura da imagem (".$dimensoes[0]." pixels) é maior que a suportada (".$largura." pixels).";
        }
        $dimensoes = getimagesize($foto['tmp_name']);
        if($dimensoes[1]>$altura){
            $error[3] = "A altura da imagem (".$dimensoes[1]." pixel) é maior que a suportada (".$altura." pixel).";
        }
        if($foto['size']>$tamanho){
            $error[4] = "O tamanho da imagem (".$foto['size']." bytes) é maior que a suportada (".$tamanho." bytes).";
        }

        if(count($error)==0){
            preg_match("/\.(gif|bmp|png|jpg){1}$/i",$foto['name'],$ext);
            $nome_img = md5(uniqid(time())).$ext[0];
            $caminho_img = "foto/".$nome_img;
            move_uploaded_file($foto['tmp_name'],$caminho_img);
            $cmd = $cn->prepare("insert into usuario (nome, email, foto) values (:nome, :email, :foto)");
            $result = $cmd->execute(array(
                ":nome"=>$nome,
                ":email"=>$email,
                ":foto"=>$nome_img
            ));
            if ($result==true){
                echo "<br> Usuário inserido com suscesso.";
            }
        }
    }
    if(count($error)!=0){
        foreach ($error as $erro) {
            echo $erro."<br>";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de usuário</title>
</head>
<body>
    <h1>Novo usuário</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" name="cadastro_form">
    Nome:<br>
    <input type="text" name="nome" class="form-control"><br><br>
    Email:<br>
    <input type="text" name="email" class="form-control"><br><br>
    Foto de exibição:<br>
    <input type="file" name="foto" class="form-control"><br><br>
    <input type="submit" name="cadastro_usuario" value="Cadastrar usuario" class="btn btn-success" >

    </form>
    <br>
    <hr>
    <h2>Usuários Cadastrados</h2>
    <?php
        $cmd = $cn->prepare("select * from usuario");
        $cmd->execute();
        $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $usuario) {
            echo "<img src='foto/".$usuario['foto']."' width='56' height='48'>";
            echo "<br>";
            echo "<b>Nome:</b> ".$usuario['nome'];
            echo "<br>";
            echo "<b>Email:</b> ".$usuario['email'];
            echo "<br>";
        }
    ?>
    
</body>
</html>