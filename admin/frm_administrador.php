<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Formulário Admin</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="formulario-menor">
        <form action="op_administrador.php" method="post">
            <fieldset>
                <input type="hidden" id="id" name="id">
                <label for="">Nome</label>
                <input type="text" name="nome" required>
                <p>
                <label for="">Email</label>
                <input type="text" name="email" required>
                <p>
                <label for="">Login</label>
                <input type="text" name="login" required>
                <p>
                <label for="">Senha</label>
                <input type="password" name="senha" required>
                <p>
                <label for="">Confirma Senha</label>
                <input type="password" name="confirma_senha" required>
            
                  <br>
                <input type="submit" name="cadastro" value="Cadastrar Administrador" class="botao">

            </fieldset>
        </form>
    </div>
</body>
</html>
