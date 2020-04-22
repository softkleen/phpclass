<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php
    echo isset($_GET['msg'])? $_GET['msg']:"";
    ?>


    <title>Lista Administrador</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <table id="tb_categoria" width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#fcfcfc">
        <tr bgcolor="#993300" align="center">
            <th width="15%" height="2"><font size="2" color="#fff">ID</font></th>
            <th width="60%" height="2"><font size="2" color="#fff">Nome</font></th>
            <th width="15%" height="2"><font size="2" color="#fff">Email</font></th>
            <th width="15%" height="2"><font size="2" color="#fff">login</font></th>
            <th colspan="2"><font size="2" color="#fff">Opções</font></th>
        </tr>
        <?php 
            require_once('../config.php');
            $admins = Administrador::getList();
            foreach($admins as $adm){
        ?>
        <tr>
            <td><font size="2" face="verdana, arial" color="#0cc">
                <?php echo $adm['id']; ?></font></td>
            <td><font size="2" face="verdana, arial" color="#cc0">
                <?php echo  $adm['nome']; ?></font></td>
            <td><font size="2" face="verdana, arial" color="#c0c">
                <?php echo  $adm['email']; ?></font></td>
            <td><font size="2" face="verdana, arial" color="#c0c">
                <?php echo  $adm['login']; ?></font></td>
            <td align="center"><font size="2" face="verdana, arial" color="#fff">
                <a href="<?php echo "alterar_administrador.php?id=".$adm['id'].
                "&nome=".$adm['nome']."&email=".$adm['email']."&login=".$adm['login']; ?>">Alterar</a>
            </font></td>
            <td align="center"><font size="2" face="verdana, arial" color="#fff">
                <a href="<?php echo "op_administrador.php?excluir=1&id=".$adm['id']; ?>">Excluir</a
            </font></td>
        </tr>
<?php } ?>
    </table>
    
</body>
</html>