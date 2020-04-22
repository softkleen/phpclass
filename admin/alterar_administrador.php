<?php
$id= filter_input(INPUT_GET,'id');
$nome= filter_input(INPUT_GET,'nome');
$email= filter_input(INPUT_GET,'email');
$login= filter_input(INPUT_GET,'login');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alteração de administrador</title>
</head>
<body>
    <form action="op_administrador.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Alteração de administrador</legend>
            <div>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
            </div>
            <div>
                <label for="">Nome</label>
                <input type="text" name="nome" value="<?php echo $nome; ?>">
            </div>
            <div>
                <label for="">Email</label>
                <input type="text" name="email" value="<?php echo $email; ?>">
            </div>
            <div>
                <label for="">Login</label>
                <input type="text" name="login" value="<?php echo $login; ?>">
            </div>
            <div>
                <input type="submit" name="alterar" value="Registrar Alteração">
            </div>
        </fieldset>
    </form>
</body>
</html>