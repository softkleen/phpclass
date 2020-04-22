<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php
    echo isset($_GET['msg'])? $_GET['msg']:"";
    ?>


    <title>Lista Noticia</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <table id="tb_categoria" width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#fcfcfc">
        <tr bgcolor="#993300" align="center">
            <th width="5%" height="2"><font size="2" color="#fff">ID</font></th>
            <th width="5%" height="2"><font size="2" color="#fff">Categoria</font></th>
            <th width="20%" height="2"><font size="2" color="#fff">Título</font></th>
            <th width="10%" height="2"><font size="2" color="#fff">Imagem</font></th>
            <th width="5%" height="2"><font size="2" color="#fff">Visitas</font></th>
            <th width="15%" height="2"><font size="2" color="#fff">Data</font></th>
            <th width="5%" height="2"><font size="2" color="#fff">Ativo</font></th>
            <th width="35%" height="2"><font size="2" color="#fff">Notícia</font></th>
            <th colspan="2"><font size="2" color="#fff">Opções</font></th>
        </tr>
        <?php 
            require_once('../config.php');
            $noticins = Noticia::getList();
            foreach($noticins as $notic){
        ?>
        <tr>
            <td><font size="2" face="verdana, arial" color="#0cc">
                <?php echo $notic['id_noticia']; ?></font></td>
            <td><font size="2" face="verdana, arial" color="#cc0">
                <?php echo  $notic['id_categoria']; ?></font></td>
            <td><font size="2" face="verdana, arial" color="#c0c">
                <?php echo  $notic['titulo_noticia']; ?></font></td>
            <td><font size="2" face="verdana, arial" color="#c0c"><img src="img/<?php echo  $notic['img_noticia']; ?>" width="40px" height="40px">
                </font></td>
            <td><font size="2" face="verdana, arial" color="#c0c">
                <?php echo  $notic['visita_noticia']; ?></font></td>
            <td><font size="2" face="verdana, arial" color="#c0c">
                <?php echo  $notic['data_noticia']; ?></font></td>
            <td><font size="2" face="verdana, arial" color="#c0c">
                <?php echo  $notic['noticia_ativo']; ?></font></td>
            <td><font size="2" face="verdana, arial" color="#c0c">
                <?php echo  $notic['noticia']; ?></font></td>
            <td align="center"><font size="2" face="verdana, arial" color="#fff">
                <a href="<?php echo "alterar_noticia.php?idnot=".$notic['id_noticia'].
                "&idcat=".$notic['id_categoria']."&titulonot=".$notic['titulo_noticia']."&imgnot=".$notic['img_noticia']
                ."&visitanot=".$notic['visita_noticia']."&datanot=".$notic['data_noticia']
                ."&notativo=".$notic['noticia_ativo']."&noticia=".$notic['noticia']; ?>">Alterar</a>
            </font></td>
            <td align="center"><font size="2" face="verdana, arial" color="#fff">
                <a href="<?php echo "op_noticia.php?excluir=1&id=".$notic['id']; ?>">Excluir</a
            </font></td>
        </tr>
<?php } ?>
    </table>
    
</body>
</html>
