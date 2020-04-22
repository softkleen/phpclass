<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Lista Categoria</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <table id="tb_categoria" width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#fcfcfc">
        <tr bgcolor="#993300" align="center">
            <th width="15%" height="2"><font size="2" color="#fff">Código</font></th>
            <th width="60%" height="2"><font size="2" color="#fff">Categoria</font></th>
            <th width="15%" height="2"><font size="2" color="#fff">Ativo</font></th>
            <th colspan="2"><font size="2" color="#fff">Opções</font></th>
        </tr>
        <?php 
            //require_once('op_categoria.php');
           //$ret = listar_categoria();
           //deletar_categoria(7);
           //if(count($ret)>0){
           foreach($ret as $categoria){
        ?>
        <tr>
            <td><font size="2" face="verdana, arial" color="#0cc">
                <?php echo $categoria['id_categoria']; ?></font></td>
            <td><font size="2" face="verdana, arial" color="#cc0">
                <?php echo $categoria['categoria']; ?></font></td>
            <td><font size="2" face="verdana, arial" color="#c0c">
                <?php echo $categoria['cat_ativo']=='1'?'Sim':'Não'; ?></font></td>
            <td align="center"><font size="2" face="verdana, arial" color="#fff"><a href="principal.php?link=">Alterar</a></font></td>
            <td align="center"><font size="2" face="verdana, arial" color="#fff"><a href="principal.php?link=">Excluir</a></font></td>
        </tr>
<?php } ?>
    </table>
    
</body>
</html>