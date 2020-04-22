<?php
include_once('../config.php');
if(isset($_SESSION['logado'])){// não é um i5
    if($_SESSION['logado']){
        header('Location: principal.php');
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Dinâmico - Área Adminsitrativa</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="box-login">
        <div id="formulario-login">
            <form id="frmlogin" name="frmlogin" action="op_administrador.php" method="post">
                <fieldset>
                    <legend>Faça Login - Área Adminsitrativa</legend>
                    <label for=""><span>Login</span></label>
                    <input type="text" name="txt_login" id="txt_login">

                    <label for=""><span>Senha</span></label>
                    <input type="password" name="txt_senha" id="txt_senha">

                    <input type="submit" name="logar" id="logar" value="logar" class="botao">
                    <br>
                    <span><?php echo (isset($_GET['msg']))?$_GET['msg']:"";  ?></span>
                </fieldset>
            </form>
        </div>
    </div>
</body>
</html>